<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class OrderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('client.orders.order-list', function ($view) {
            $data = $this->getDataForOrderList();
            $view->with('orderData', $data);
        });
    }

    private function getDataForOrderList()
    {
        $orderPending = Order::select('orders.*')
            ->where('user_id', Auth::user()->id)
            ->whereIn('status', ['Pending', 'Paid'])
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataOrderPending = $orderPending->map(function ($order) {
            return [
                'id' => $order->id,
                'order_details' => OrderDetail::select('order_details.*', 'products.name', 'products.image', 'products.retail_price', 'products.discount', 'unit_id', 'units.name as unit_name')
                    ->join('products', 'products.id', 'product_id')
                    ->join('units', 'units.id', 'unit_id')
                    ->where('order_id', $order->id)
                    ->get(),
                'payment_method_id' => $order->payment_method_id,
                'code' => $order->code,
                'customer' => $order->customer,
                'email' => $order->email,
                'phone' => $order->phone,
                'address' => $order->address,
                'note' => $order->note,
                'total_price' => $order->total_price,
                'status' => $order->status,
                'created_at' => $order->created_at->format('H:i d/m/Y'),
            ];
        });

        $orderSuccess = Order::select('orders.*')
            ->where('user_id', Auth::user()->id)
            ->where('status', 'Success')
            ->orderBy('id', 'desc')
            ->paginate(1);

        $dataOrderSuccess = $orderSuccess->map(function ($order) {
            return [
                'id' => $order->id,
                'order_details' => OrderDetail::select('order_details.*', 'products.name', 'products.image', 'products.retail_price', 'products.discount', 'unit_id', 'units.name as unit_name')
                    ->join('products', 'products.id', 'product_id')
                    ->join('units', 'units.id', 'unit_id')
                    ->where('order_id', $order->id)
                    ->get(),
                'payment_method_id' => $order->payment_method_id,
                'code' => $order->code,
                'customer' => $order->customer,
                'email' => $order->email,
                'phone' => $order->phone,
                'address' => $order->address,
                'note' => $order->note,
                'total_price' => $order->total_price,
                'status' => $order->status,
                'created_at' => $order->created_at->format('d/m/Y H:i:s'),
            ];
        });

        $orderFailed = Order::select('orders.*')
            ->where('user_id', Auth::user()->id)
            ->where('status', 'Failed')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataOrderFailed = $orderFailed->map(function ($order) {
            return [
                'id' => $order->id,
                'order_details' => OrderDetail::select('order_details.*', 'products.name', 'products.image', 'products.retail_price', 'products.discount', 'unit_id', 'units.name as unit_name')
                    ->join('products', 'products.id', 'product_id')
                    ->join('units', 'units.id', 'unit_id')
                    ->where('order_id', $order->id)
                    ->get(),
                'payment_method_id' => $order->payment_method_id,
                'code' => $order->code,
                'customer' => $order->customer,
                'email' => $order->email,
                'phone' => $order->phone,
                'address' => $order->address,
                'note' => $order->note,
                'total_price' => $order->total_price,
                'status' => $order->status,
                'created_at' => $order->created_at->format('d/m/Y H:i:s'),
            ];
        });


        // Logic lấy dữ liệu cho topbar
        return [
            'pending' => $dataOrderPending,
            'success' => $dataOrderSuccess,
            'failed' => $dataOrderFailed,
        ];
    }
}
