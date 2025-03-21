<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Support\Str;
use App\Models\Payment_method;
use App\Models\GoodReceiptNote;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\GoodReceiptNoteDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GoodReceiptNoteController extends Controller
{
    public function index()
    {
        $goods = GoodReceiptNote::select('good_receipt_notes.*', 'suppliers.name As supplier_name', 'users.name As user_name', 'payment_methods.name As payment_method_name')
            ->join('suppliers', 'suppliers.id', 'supplier_id')
            ->join('users', 'users.id', 'user_id')
            ->join('payment_methods', 'payment_methods.id', 'payment_method_id')
            ->orderBy('good_receipt_notes.id', 'DESC')
            ->paginate(10);
        return view('admin/good-receipt-notes/index', compact('goods'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $payments = Payment_method::all();
        $products = Product::all();
        return view('admin/good-receipt-notes/create', compact('suppliers', 'payments', 'products'));
    }

    public function store(Request $request)
    {
        $cart = Session::get('cart');
        // Kiểm tra xem session 'cart' có tồn tại hay không
        if (!$cart) {

            // Nếu không tồn tại thì trả về thông tin
            toast('Vui lòng nhập chi tiết đơn hàng', 'error');
            return redirect('admin/don-nhap-hang/them-moi');
        }
        //Nếu có thì tạo ra đơn đặt hàng -> tạo ra chi tiết đơn hàng
        $lastInsertedId = DB::table('good_receipt_notes')->insertGetId([
            'supplier_id' => $request->supplier_id,
            'user_id' => $request->user_id,
            'payment_method_id' => $request->payment_method_id,
            'code' => 'HD-' . Str::upper(Str::random(5)) . rand(1, 99999999),
            'total_price' => 0,
            'created_at' => now(),
        ]);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['sub_total'];
            GoodReceiptNoteDetail::create([
                'good_receipt_note_id' => $lastInsertedId,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'sub_total' => $item['sub_total'],
            ]);
        }
        GoodReceiptNote::where('id', $lastInsertedId)->update([
            'total_price' => $total
        ]);

        session()->forget('cart');

        toast('Tạo thành công đơn nhập hàng', 'success');
        return redirect('admin/don-nhap-hang');
    }

    public function confirm($code)
    {
        // Kiểm tra người xác nhận đơn
        $goodReceiptNote = GoodReceiptNote::where('code', $code)->first();
        if (Auth::user()->id == $goodReceiptNote->user_id) {
            // Lấy ra đơn nhập hàng
            $details = GoodReceiptNoteDetail::where('good_receipt_note_id',$goodReceiptNote->id)->get();
            foreach ($details as $item) {
                //Kiểm tra sản phẩm trong kho
                $productInWarehouse = Warehouse::where('product_id', $item->product_id)->first();
                if ($productInWarehouse) {
                    //Nếu có thì cập nhật lại số lượng
                    $productInWarehouse->update([
                        'quantity' => $productInWarehouse->quantity + $item->quantity
                    ]);
                } else {
                    // Nếu không có thì thêm mới sản phẩm trong kho
                    Warehouse::create([
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                    ]);
                }
            }
            $goodReceiptNote->update([
                'status' => 'Success',
            ]);

            toast('Xác nhận đơn thành công', 'success');
            return redirect('admin/don-nhap-hang');
        } else {
            toast('Bạn chỉ có thể xác nhận đơn của bạn tạo', 'error');
            return redirect('admin/don-nhap-hang');
        }
    }

    public function detail($code)
    {
        $goodReceiptNote = GoodReceiptNote::select('good_receipt_notes.*', 'suppliers.name As supplier_name', 'users.name As user_name', 'payment_methods.name As payment_method_name')
            ->join('suppliers', 'suppliers.id', 'supplier_id')
            ->join('users', 'users.id', 'user_id')
            ->join('payment_methods', 'payment_methods.id', 'payment_method_id')
            ->where('good_receipt_notes.code', $code)
            ->first();

        $goodReceiptNoteDetail = GoodReceiptNoteDetail::select('good_receipt_note_details.*', 'products.name As product_name', 'sub_total', 'image', 'unit_id', 'units.name AS unit_name')
            ->join('products', 'products.id', 'product_id')
            ->join('units', 'units.id', 'unit_id')
            ->where('good_receipt_note_id', $goodReceiptNote->id)
            ->get();

        return view('admin/good-receipt-notes/detail', compact('goodReceiptNote', 'goodReceiptNoteDetail'));
    }

    public function edit($code)
    {
        $goodReceiptNote = GoodReceiptNote::where('code', $code)->first();

        if (Auth::user()->id == $goodReceiptNote->user_id) {
            $goodReceiptNoteDetail = GoodReceiptNoteDetail::select('good_receipt_note_details.*', 'products.name AS product_name', 'unit_id', 'units.name AS unit_name')
                ->join('products', 'products.id', 'product_id')
                ->join('units', 'units.id', 'unit_id')
                ->where('good_receipt_note_id',$goodReceiptNote->id)->get();
            $suppliers = Supplier::all();
            $payments = Payment_method::all();
            $products = Product::all();
            return view('admin/good-receipt-notes/edit', compact('suppliers', 'payments', 'products', 'goodReceiptNote', 'goodReceiptNoteDetail'));
        } else {
            toast('Bạn chỉ có chỉnh sửa đơn của bạn tạo', 'error');
            return redirect('admin/don-nhap-hang');
        }
    }

    public function update(Request $request, $code)
    {
        $goodReceiptNote = GoodReceiptNote::where('code', $code)->first();
        $goodReceiptNote->update([
            'supplier_id' => $request->supplier_id,
            'user_id' => Auth::user()->id,
            'payment_method_id' => $request->payment_method_id
        ]);

        toast('Cập nhật thành công', 'success');
        return redirect('admin/don-nhap-hang');
    }

    public function delete($code)
    {
        $goodReceiptNote = GoodReceiptNote::where('code', $code)->first();
        if ($goodReceiptNote->user_id == Auth::user()->id) {
            $goodReceiptNote->delete();
            toast('Xóa thành công đơn nhập hàng', 'success');
            return redirect('admin/don-nhap-hang');
        } else {
            toast('Bạn chỉ có thể xóa đơn do bạn tạo ra', 'error');
            return redirect('admin/don-nhap-hang');
        }
    }
}
