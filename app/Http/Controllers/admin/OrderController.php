<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::select('*', 'payment_methods.name As payment_method_name')
            ->join('payment_methods', 'payment_methods.id', 'payment_method_id')
            ->where('status', 'Success')
            ->orderBy('orders.id','desc')
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
            ->whereIn('status',['Pending','Paid'])
            ->orderByRaw("CASE WHEN status = 'Paid' THEN 0 WHEN status = 'Pending' THEN 1 ELSE 2 END")
            ->paginate(10);
        return view('admin/orders/list-order-pending', compact('orders'));
    }

    public function updateStatus($code){
        $order = Order::where('code',$code)
        ->first();
        $order->update([
            'status' => 'Success'
        ]);

        toast('Xác nhận giao hàng thành công','success');
        return back();
    }
}
