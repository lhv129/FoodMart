<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Payment_method;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::select('*', 'payment_methods.name As payment_method_name')
            ->join('payment_methods', 'payment_methods.id', 'payment_method_id')
            ->where('status', 'Success')
            ->orderBy('orders.id', 'desc')
            ->paginate(10);
        return view('admin/orders/index', compact('orders'));
    }

    public function detail($code)
    {
        $order = Order::select('orders.*', 'users.name As user_name', 'customer', 'payment_methods.name As payment_method_name')
            ->join('users', 'users.id', 'user_id')
            ->join('payment_methods', 'payment_methods.id', 'payment_method_id')
            ->where('code', $code)
            ->first();
        $orderDetail = OrderDetail::select('order_details.*', 'products.name As product_name', 'sub_total', 'image', 'unit_id', 'units.name AS unit_name')
            ->join('products', 'products.id', 'product_id')
            ->join('units', 'units.id', 'unit_id')
            ->where('order_id', $order->id)
            ->get();
        return view('admin/orders/detail', compact('order', 'orderDetail'));
    }

    public function listOrderPending()
    {
        $orders = Order::select('*', 'payment_methods.name As payment_method_name')
            ->join('payment_methods', 'payment_methods.id', 'payment_method_id')
            ->whereIn('status', ['Pending', 'Paid'])
            ->orderByRaw("CASE WHEN status = 'Paid' THEN 0 WHEN status = 'Pending' THEN 1 ELSE 2 END")
            ->paginate(10);
        return view('admin/orders/list-order-pending', compact('orders'));
    }

    public function confirmOrder($code)
    {
        $order = Order::where('code', $code)
            ->first();
        $orderDetail = OrderDetail::where('order_id', $order->id)
            ->get();

        // Bước 1: Kiểm tra tất cả các phần tử
        $allConditionsMet = true;
        foreach ($orderDetail as $item) {
            $productInWarehouse = Warehouse::where('product_id', $item->product_id)->first();
            if (!$productInWarehouse || $productInWarehouse->quantity < $item->quantity) {
                $allConditionsMet = false;

                $product = Product::find($item->product_id);
                toast("Sản phẩm $product->name trong kho đã hết", 'error');
                return redirect('admin/don-dat-hang/cho-xu-ly');
                break; // Dừng vòng lặp nếu có phần tử không đủ điều kiện
            }
        }
        // Nếu tất cả các phần tử đều đủ điều kiện, thực hiện cập nhật
        if ($allConditionsMet) {
            // Bước 2: Thực hiện cập nhật
            foreach ($orderDetail as $item) {
                $productInWarehouse = Warehouse::where('product_id', $item->product_id)->first();
                $productInWarehouse->update([
                    'quantity' => $productInWarehouse->quantity - $item->quantity
                ]);

                //Cập nhật thêm topRate của sản phẩm
                $product = Product::where('id', $item->product_id)->first();
                $product->update([
                    'topRate' => $product->topRate += 1
                ]);
            }
            $order->update([
                'status' => 'Success',
            ]);
            toast('Xác nhận đơn đặt hàng thành công', 'success');
            return redirect('admin/don-dat-hang/cho-xu-ly');
        }
    }

    public function edit($code)
    {
        $order = Order::where('code', $code)->first();
        $orderDetail = OrderDetail::select('order_details.*', 'products.name AS product_name', 'unit_id', 'units.name AS unit_name')
            ->join('products', 'products.id', 'product_id')
            ->join('units', 'units.id', 'unit_id')
            ->where('order_id', $order->id)->get();
        $payments = Payment_method::all();
        $products = Product::all();
        return view('admin/orders/edit', compact('order', 'orderDetail', 'payments', 'products'));
    }

    public function update(Request $request, $code)
    {
        $order = Order::where('code', $code)->first();
        $order->update([
            'customer' => $request->customer,
            'user_id' => $order->user_id,
            'payment_method_id' => $request->payment_method_id
        ]);

        toast('Cập nhật thành công', 'success');
        return redirect('admin/don-dat-hang');
    }


    public function delete($code)
    {
        $order = Order::where('code', $code)->first();
        $order->update([
            'status' => 'Failed'
        ]);
        toast('Hủy đơn đặt hàng thành công', 'success');
        return back();
    }
}
