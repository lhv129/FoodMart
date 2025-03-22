<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\GoodDeliveryNote;
use App\Http\Controllers\Controller;
use App\Models\GoodDeliveryNoteDetail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreGoodDeliveryNoteDetail;

class GoodDeliveryNoteDetailController extends Controller
{
    public function store(StoreGoodDeliveryNoteDetail $request)
    {
        // Lấy dữ liệu từ request
        $product = Product::select('products.id', 'unit_id', 'products.name', 'retail_price','discount','units.name AS unit_name')
            ->join('units', 'units.id', 'unit_id')
            ->where('products.id', $request->product_id)
            ->first();
        $productInWarehouse = Warehouse::where('product_id', $product->id)->first();
        if ($request->quantity > $productInWarehouse->quantity) {
            toast("Sản phẩm $product->name trong kho chỉ còn $productInWarehouse->quantity", 'error');
            return back()->withInput();
        }
        // Tạo một mảng chứa thông tin sản phẩm
        $item = [
            'product_id' => $product->id,
            'product' => $product->name,
            'unit' => $product->unit_name,
            'quantity' => $request->quantity,
            'sub_total' => ($product->retail_price - $product->discount) * $request->quantity
        ];
        // Lấy mảng hiện tại từ session hoặc tạo mới nếu chưa có
        $cartDelivery = Session::get('cartDelivery', []);

        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng hay chưa
        $productExists = false;

        // Nếu có thì cập nhật lại giá và số lượng
        foreach ($cartDelivery as $key => $cartDeliveryItem) {
            //Kiểm tra trước nếu số lượng sản phẩm trong cart ít sản phẩm trong kho thì cập nhật lại số lượng trong cart
            $quantityInCart = $cartDelivery[$key]['quantity'] + $item['quantity'];
            if ($cartDeliveryItem['product_id'] == $item['product_id']) {
                if ($quantityInCart <= $productInWarehouse->quantity) {
                    $cartDelivery[$key]['quantity'] += $item['quantity'];
                    $cartDelivery[$key]['sub_total'] = $product->retail_price * $cartDelivery[$key]['quantity'];
                    $productExists = true;
                    break;
                } else {
                    //Nếu không sẽ trả về thông báo lỗi
                    toast("Sản phẩm $product->name trong kho chỉ còn $productInWarehouse->quantity", 'error');
                    return back()->withInput();
                }
            }
        }

        // Nếu sản phẩm chưa tồn tại, thêm vào giỏ hàng
        if (!$productExists) {
            $cartDelivery[] = $item;
        }
        // Tính tổng giá tiền
        $total = 0;
        foreach ($cartDelivery as $cartDeliveryItem) {
            $total += $cartDeliveryItem['sub_total'];
        }

        // Lưu lại vào session
        Session::put('cartDelivery', $cartDelivery);

        return back()->withInput();
    }

    public function edit($id)
    {
        $goodDeliveryNoteDetail =  GoodDeliveryNoteDetail::find($id);
        //Cập nhật lại giá cho tổng đơn hàng
        $goodDeliveryNote = GoodDeliveryNote::where('id', $goodDeliveryNoteDetail->good_delivery_note_id)->first();
        $goodDeliveryNote->update([
            'total_price' => $goodDeliveryNote->total_price - $goodDeliveryNoteDetail->sub_total
        ]);

        $goodDeliveryNoteDetail->delete();

        toast('Xóa thành công', 'success');
        return back();
    }

    public function update(StoreGoodDeliveryNoteDetail $request, $id)
    {
        //Kiểm tra sản phẩm đã có trong chi tiết đơn hàng chưa
        $productInDetails = GoodDeliveryNoteDetail::select('good_delivery_note_details.*')
            ->where('good_delivery_note_id', $id)
            ->where('product_id', $request->product_id)
            ->first();
        //Lấy ra giá sản phẩm
        $product = Product::select('products.id', 'products.name', 'retail_price','discount')
            ->where('products.id', $request->product_id)
            ->first();
        $productInWarehouse = Warehouse::where('product_id', $request->product_id)->first();
        if ($productInDetails) {
            //Nếu sản phẩm có trong chi tiết hóa đơn
            //Kiểm tra trước số lượng sản phẩm trong chi tiết + thêm mới
            $totalQuantity = $productInDetails->quantity + $request->quantity;
            if ($productInWarehouse->quantity >= $totalQuantity) {
                // Số lượng trong kho nhiều hơn hoặc bằng số lượng trong đơn thì cho cập nhật lại số lượng,sub_total trong chi tiết đơn
                $productInDetails->update([
                    'quantity' => $totalQuantity,
                    'sub_total' => $totalQuantity * ($product->retail_price - $product->discount),
                ]);
                //Cập nhật lại giá cho tổng đơn hàng
                $totalPrice = $this->sumTotalPrice($id);
                GoodDeliveryNote::where('id', $id)->update([
                    'total_price' => $totalPrice,
                ]);

                toast("Thêm mới thành công", 'success');
                return back()->withInput();
            } else {
                toast("Sản phẩm $product->name chỉ còn $productInWarehouse->quantity số lượng trong kho", 'error');
                return back()->withInput();
            }
        } else {
            // Kiểm tra số lượng sản phẩm có trong kho
            if ($productInWarehouse->quantity >= $request->quantity) {
                // Nếu sản phẩm trong có còn đủ số lượng thì thêm mới
                GoodDeliveryNoteDetail::create([
                    'good_delivery_note_id' => $id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'sub_total' => $request->quantity * ($product->retail_price - $product->discount)
                ]);
                //Cập nhật lại giá cho tổng đơn hàng
                $totalPrice = $this->sumTotalPrice($id);
                GoodDeliveryNote::where('id', $id)->update([
                    'total_price' => $totalPrice,
                ]);
                return back()->withInput();
            } else {
                //Nếu không đủ thì trả về thông báo
                toast("Sản phẩm $product->name chỉ còn $productInWarehouse->quantity số lượng trong kho", 'error');
                return back()->withInput();
            }
        }
    }

    public function delete($product)
    {
        $cartDelivery = Session::get('cartDelivery', []);
        foreach ($cartDelivery as $key => $item) {
            if ($item['product'] == $product) {
                unset($cartDelivery[$key]);
                break;
            }
        }
        Session::put('cartDelivery', array_values($cartDelivery));

        return back();
    }

    public function sumTotalPrice($id)
    {
        $productInDetails = GoodDeliveryNoteDetail::select('id', 'good_delivery_note_id', 'sub_total')
            ->where('good_delivery_note_id', $id)
            ->get();

        $totalPrice = 0;
        foreach ($productInDetails as $item) {
            $totalPrice += $item->sub_total;
        }

        return $totalPrice;
    }
}
