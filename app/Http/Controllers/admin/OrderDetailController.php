<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Warehouse;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGoodDeliveryNoteDetail;
use App\Models\Order;

class OrderDetailController extends Controller
{
    public function update(StoreGoodDeliveryNoteDetail $request, $id)
    {

        //Kiểm tra sản phẩm đã có trong chi tiết đơn hàng chưa
        $productInDetails = OrderDetail::select('order_details.*')
            ->where('order_id', $id)
            ->where('product_id', $request->product_id)
            ->first();

        //Lấy ra giá sản phẩm
        $product = Product::select('products.id', 'products.name', 'retail_price', 'discount')
            ->where('products.id', $request->product_id)
            ->first();
        $productInWarehouse = Warehouse::where('product_id', $request->product_id)->first();

        if ($productInDetails) {
            //Nếu sản phẩm có trong chi tiết hóa đơn
            //Tiếp tục kiểm tra trước số lượng sản phẩm trong chi tiết + thêm mới
            $totalQuantity = $productInDetails->quantity + $request->quantity;
            if ($productInWarehouse->quantity >= $totalQuantity) {
                // Số lượng trong kho nhiều hơn hoặc bằng số lượng trong đơn thì cho cập nhật lại số lượng,sub_total trong chi tiết đơn
                $productInDetails->update([
                    'quantity' => $totalQuantity,
                    'sub_total' => $totalQuantity * ($product->retail_price - $product->discount),
                ]);
                //Cập nhật lại giá cho tổng đơn hàng
                $totalPrice = $this->sumTotalPrice($id);
                Order::where('id', $id)->update([
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
                OrderDetail::create([
                    'order_id' => $id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'sub_total' => $request->quantity * ($product->retail_price - $product->discount)
                ]);
                //Cập nhật lại giá cho tổng đơn hàng
                $totalPrice = $this->sumTotalPrice($id);
                Order::where('id', $id)->update([
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

    public function delete($id){
        $orderDetail = OrderDetail::find($id);
        //Cập nhật lại giá cho tổng đơn hàng
        $order = Order::where('id', $orderDetail->order_id)->first();
        $order->update([
            'total_price' => $order->total_price - $orderDetail->sub_total
        ]);

        $orderDetail->delete();

        toast('Xóa thành công', 'success');
        return back();
    }



    public function sumTotalPrice($id)
    {
        $productInDetails = OrderDetail::select('id', 'order_id', 'sub_total')
            ->where('order_id', $id)
            ->get();
        $totalPrice = 0;
        foreach ($productInDetails as $item) {
            $totalPrice += $item->sub_total;
        }

        return $totalPrice;
    }
}
