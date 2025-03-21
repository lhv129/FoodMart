<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Payment_method;
use App\Models\GoodDeliveryNote;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\GoodDeliveryNoteDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class GoodDeliveryNoteController extends Controller
{
    public function index()
    {
        $deliveries = GoodDeliveryNote::select('good_delivery_notes.*', 'users.name As user_name', 'payment_methods.name As payment_method_name')
            ->join('users', 'users.id', 'user_id')
            ->join('payment_methods', 'payment_methods.id', 'payment_method_id')
            ->orderBy('good_delivery_notes.id', 'DESC')
            ->paginate(10);
        return view('admin/good-delivery-notes/index', compact('deliveries'));
    }

    public function create()
    {
        $payments = Payment_method::all();
        $products = Product::all();
        return view('admin/good-delivery-notes/create', compact('payments', 'products'));
    }

    public function store(Request $request)
    {
        $cartDelivery = Session::get('cartDelivery');
        // Kiểm tra xem session 'cartDelivery' có tồn tại hay không
        if (!$cartDelivery) {
            // Nếu không tồn tại thì trả về thông tin
            toast('Vui lòng nhập chi tiết đơn hàng', 'error');
            return redirect('admin/don-ban-hang/them-moi')->withInput();
        }
        //Nếu có thì tạo ra đơn đặt hàng -> tạo ra chi tiết đơn hàng
        $lastInsertedId = DB::table('good_delivery_notes')->insertGetId([
            'user_id' => $request->user_id,
            'payment_method_id' => $request->payment_method_id,
            'customer' => $request->customer,
            'code' => 'HD-' . rand(1, 99999999),
            'total_price' => 0,
            'created_at' => now(),
        ]);

        $total = 0;
        foreach ($cartDelivery as $item) {
            $total += $item['sub_total'];
            GoodDeliveryNoteDetail::create([
                'good_delivery_note_id' => $lastInsertedId,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'sub_total' => $item['sub_total'],
            ]);
        }
        GoodDeliveryNote::where('id', $lastInsertedId)->update([
            'total_price' => $total
        ]);

        session()->forget('cartDelivery');

        toast('Tạo thành công đơn bán hàng', 'success');
        return redirect('admin/don-ban-hang');
    }

    public function confirm($id)
    {
        // Kiểm tra người xác nhận đơn
        $goodDeliveryNote = GoodDeliveryNote::where('id', $id)->first();
        if (Auth::user()->id == $goodDeliveryNote->user_id) {
            // Lấy ra đơn bán hàng
            $details = GoodDeliveryNoteDetail::where('good_delivery_note_id', $id)->get();
            // Bước 1: Kiểm tra tất cả các phần tử
            $allConditionsMet = true;
            foreach ($details as $item) {
                $productInWarehouse = Warehouse::where('product_id', $item->product_id)->first();
                if (!$productInWarehouse || $productInWarehouse->quantity < $item->quantity) {
                    $allConditionsMet = false;

                    $product = Product::find($item->product_id);
                    toast("Sản phẩm $product->name đã hết trong kho", 'error');
                    return redirect('admin/don-ban-hang');
                    break; // Dừng vòng lặp nếu có phần tử không đủ điều kiện
                }
            }
            // Nếu tất cả các phần tử đều đủ điều kiện, thực hiện cập nhật
            if ($allConditionsMet) {
                // Bước 2: Thực hiện cập nhật
                foreach ($details as $item) {
                    $productInWarehouse = Warehouse::where('product_id', $item->product_id)->first();
                    $productInWarehouse->update([
                        'quantity' => $productInWarehouse->quantity - $item->quantity
                    ]);

                    //Cập nhật thêm topRate của sản phẩm
                    $product = Product::where('id',$item->product_id)->first();
                    $product->update([
                        'topRate' => $product->topRate += 1
                    ]);
                }
                $goodDeliveryNote->update([
                    'status' => 'Success',
                ]);
                toast('Xác nhận đơn thành công', 'success');
                return redirect('admin/don-ban-hang');
            }
        } else {
            toast('Bạn chỉ có thể xác nhận đơn do bạn tạo ra', 'error');
            return redirect('admin/don-ban-hang');
        }
    }

    public function edit($id)
    {
        $goodDeliveryNote = GoodDeliveryNote::where('id', $id)->first();
        if (Auth::user()->id == $goodDeliveryNote->user_id) {
            $goodDeliveryNoteDetail = GoodDeliveryNoteDetail::select('good_delivery_note_details.*', 'products.name AS product_name', 'unit_id', 'units.name AS unit_name')
                ->join('products', 'products.id', 'product_id')
                ->join('units', 'units.id', 'unit_id')
                ->where('good_delivery_note_id', $id)->get();
            $payments = Payment_method::all();
            $products = Product::all();
            return view('admin/good-delivery-notes/edit', compact('payments', 'products', 'goodDeliveryNote', 'goodDeliveryNoteDetail'));
        } else {
            toast('Bạn chỉ có chỉnh sửa đơn của bạn tạo', 'error');
            return redirect('admin/don-ban-hang');
        }
    }

    public function update(Request $request,$id)
    {
        $goodDeliveryNote = GoodDeliveryNote::where('id', $id)->first();
        $goodDeliveryNote->update([
            'customer' => $request->customer,
            'user_id' => Auth::user()->id,
            'payment_method_id' => $request->payment_method_id
        ]);

        toast('Cập nhật thành công', 'success');
        return redirect('admin/don-ban-hang');  
    }

    public function detail($code)
    {
        $goodDeliveryNote = GoodDeliveryNote::select('good_delivery_notes.*', 'users.name As user_name', 'customer', 'payment_methods.name As payment_method_name')
            ->join('users', 'users.id', 'user_id')
            ->join('payment_methods', 'payment_methods.id', 'payment_method_id')
            ->where('good_delivery_notes.code', $code)
            ->first();

        $goodDeliveryNoteDetail = GoodDeliveryNoteDetail::select('good_delivery_note_details.*', 'products.name As product_name', 'sub_total', 'image', 'unit_id', 'units.name AS unit_name')
            ->join('products', 'products.id', 'product_id')
            ->join('units', 'units.id', 'unit_id')
            ->where('good_delivery_note_id', $goodDeliveryNote->id)
            ->get();

        return view('admin/good-delivery-notes/detail', compact('goodDeliveryNote', 'goodDeliveryNoteDetail'));
    }
}
