<?php

namespace App\Http\Controllers\client;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Payment_method;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Controllers\client\Payment\VnPayController;

class OrderController extends Controller
{
    public function index()
    {
        $carts = Cart::select('carts.*', 'products.name', 'products.image', 'retail_price', 'discount', 'products.slug', 'warehouses.quantity as warehouse_quantity', 'unit_id', 'units.name as unit_name')
            ->join('products', 'products.id', 'carts.product_id')
            ->join('warehouses', 'warehouses.product_id', 'carts.product_id')
            ->join('units', 'units.id', 'unit_id')
            ->where('carts.user_id', Auth::user()->id)
            ->paginate(10);

        return view('client/orders/index', compact('carts'));
    }

    public function order()
    {
        $carts = Cart::select('carts.*', 'products.name', 'products.image', 'retail_price', 'discount', 'products.slug', 'unit_id', 'units.name as unit_name')
            ->join('products', 'products.id', 'carts.product_id')
            ->join('warehouses', 'warehouses.product_id', 'carts.product_id')
            ->join('units', 'units.id', 'unit_id')
            ->where('carts.user_id', Auth::user()->id)
            ->get();
        if ($carts->count() > 0) {
            $payment_methods = Payment_method::all();
            $totalAmount = Cart::select('carts.*')
                ->where('user_id', Auth::user()->id)
                ->sum('sub_total');
            return view('client/orders/order', compact('carts', 'payment_methods', 'totalAmount'));
        }
        toast('Giỏ hàng của bạn đang trống', 'error');
        return redirect('san-pham/danh-sach');
    }

    public function handleOrder(StoreOrderRequest $request)
    {
        if (!$request->payment_method_id) {
            toast('Vui lòng chọn phương thức thanh toán', 'error');
            return back()->withInput();
        }

        //Lấy ra danh sách sản phẩm trong giỏ hàng
        $carts = Cart::select('carts.*')
            ->where('user_id', Auth::user()->id)
            ->get();

        //b1. Tạo hóa đơn
        $lastInsertedId = DB::table('orders')->insertGetId([
            'user_id' => Auth::user()->id,
            'payment_method_id' => $request->payment_method_id,
            'customer' => $request->customer,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
            'code' => 'HD-' . Str::upper(Str::random(5)) . rand(1, 99999999),
            'total_price' => 0,
            'created_at' => now(),
        ]);
        //b2. Tạo  chi tiết hóa đơn
        $total = 0;
        foreach ($carts as $item) {
            $total += $item->sub_total;
            OrderDetail::create([
                'order_id' => $lastInsertedId,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'sub_total' => $item->sub_total,
            ]);
        }

        //b3.Xóa hết sản phẩm trong giỏ hàng
        $carts = Cart::select('carts.*')
            ->where('user_id', Auth::user()->id)
            ->delete();

        Order::where('id', $lastInsertedId)->update([
            'total_price' => $total
        ]);

        if ($request->payment_method_id == 1) {
            toast('Đặt hàng thành công', 'success');
            return redirect('don-dat-hang/danh-sach');
        } elseif ($request->payment_method_id == 2) {
            $orderLastId = Order::select('orders.*', 'users.name as user_name')
                ->join('users', 'users.id', 'user_id')
                ->where('orders.id', $lastInsertedId)
                ->first();

            $vnpayController = new VnPayController();
            $vnpUrl = $vnpayController->createPayment($request, $orderLastId);
            if ($vnpUrl) {
                $orderLastId->update([
                    'status' => 'Paid'
                ]);
                toast('Thanh toán thành công', 'success');
                return redirect($vnpUrl);
            } else {
                Order::find($lastInsertedId)->delete();
            }
        }
    }

    public function orderList()
    {
        return view('client/orders/order-list',);
    }

    public function orderDetail($code)
    {
        $order = $this->getOrder($code)
            ->first();
        if ($order->user_id === Auth::user()->id) {
            $orderDetails = $this->getOrderDetails()
                ->where('order_id', $order->id)
                ->get();

            $totalAmount = OrderDetail::select('order_details.*')
                ->where('order_id', $order->id)
                ->sum('sub_total');

            return view('client/orders/detail', compact('order', 'orderDetails', 'totalAmount'));
        }
        toast('Bạn không có quyền truy cập', 'error');
        return back();
    }

    public function orderEdit($code)
    {
        $order = $this->getOrder($code)->first();
        if ($order) {
            if ($order->payment_method_id === 2) {
                //Đơn được thanh toán chuyển khoản thì không cho cập nhật
                toast('Đơn hàng đã được thanh toán,nếu muốn thay đổi vui lòng liên hệ lại với shop', 'success');
                return redirect('don-dat-hang/danh-sach');
            } elseif ($order->status === 'Pending') {
                //Chỉ đơn đang trong trạng thái Pending thì mới được cập nhật
                $orderDetails = $this->getOrderDetails()
                    ->where('order_id', $order->id)
                    ->get();
                $payment_methods = Payment_method::all();

                $totalAmount = OrderDetail::select('order_details.*')
                    ->where('order_id', $order->id)
                    ->sum('sub_total');

                return view('client/orders/edit', compact('order', 'orderDetails', 'totalAmount', 'payment_methods'));
            }
            toast('Không thể thay đổi đơn hàng', 'error');
            return redirect('don-dat-hang/danh-sach');
        }
        toast('Bạn không có quyền truy cập', 'error');
        return back();
    }

    public function handleUpdateOrder(StoreOrderRequest $request, $code)
    {
        $order = $this->getOrder($code)
            ->first();
        if ($request->payment_method_id == 1 && $order->status === 'Pending') {
            $order->update([
                'customer' => $request->customer,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'note' => $request->note,
                'payment_method_id' => $request->payment_method_id

            ]);
            toast('Cập nhật thành công', 'success');
            return back();
        }
        if ($request->payment_method_id == 2 && $order->status === 'Pending') {
            $orderLastId = Order::select('orders.*', 'users.name as user_name')
                ->join('users', 'users.id', 'user_id')
                ->where('orders.id', $order->id)
                ->first();
            $vnpayController = new VnPayController();
            $vnpUrl = $vnpayController->createPayment($request, $orderLastId);
            if ($vnpUrl) {
                $orderLastId->update([
                    'customer' => $request->customer,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'email' => $request->email,
                    'note' => $request->note,
                    'payment_method_id' => $request->payment_method_id,
                    'status' => 'Paid'
                ]);
                toast('Thanh toán thành công', 'success');
                return redirect($vnpUrl);
            } else {
                Order::find($order->id)->delete();
            }
        }
    }

    public function deleteOrder($code)
    {
        $order = $this->getOrder($code)
            ->first();
        $order->update([
            'status' =>  'Failed'
        ]);
        toast('Hủy đơn mua hàng thành công', 'success');
        return back();
    }

    public function restoreOrder($code)
    {
        $order = $this->getOrder($code)
            ->first();
        if ($order) {
            if ($order->status === 'Failed') {
                $orderDetails = $this->getOrderDetails()
                    ->where('order_id', $order->id)
                    ->get();
                $payment_methods = Payment_method::all();
                $totalAmount = OrderDetail::select('order_details.*')
                    ->where('order_id', $order->id)
                    ->sum('sub_total');
                return view('client/orders/restore', compact('order', 'orderDetails', 'totalAmount', 'payment_methods'));
            }
        }
        toast('Không tìm thấy đơn hàng của bạn', 'error');
        return redirect('don-dat-hang/danh-sach');
    }

    public function handleRestoreOrder(StoreOrderRequest $request, $code)
    {
        $order = $this->getOrder($code)
            ->first();
        if ($request->payment_method_id == 1 && $order->status === 'Failed') {
            $order->update([
                'customer' => $request->customer,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'note' => $request->note,
                'payment_method_id' => $request->payment_method_id,
                'status' => 'Pending'

            ]);
            toast('Mua hàng thành công', 'success');
            return redirect('don-dat-hang/danh-sach');
        }
        if ($request->payment_method_id == 2 && $order->status === 'Failed') {
            $orderLastId = Order::select('orders.*', 'users.name as user_name')
                ->join('users', 'users.id', 'user_id')
                ->where('orders.id', $order->id)
                ->first();
            $vnpayController = new VnPayController();
            $vnpUrl = $vnpayController->createPayment($request, $orderLastId);
            if ($vnpUrl) {
                $orderLastId->update([
                    'customer' => $request->customer,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'email' => $request->email,
                    'note' => $request->note,
                    'payment_method_id' => $request->payment_method_id,
                    'status' => 'Paid'
                ]);
                toast('Thanh toán thành công', 'success');
                return redirect($vnpUrl);
            } else {
                Order::find($order->id)->delete();
            }
        }
    }




    //Câu lệnh truy vấn
    public function getOrder($code)
    {
        $order = $order = Order::select('orders.*', 'payment_methods.name as payment_method_name')
            ->join('payment_methods', 'payment_methods.id', 'payment_method_id')
            ->where('code', $code)
            ->where('user_id', Auth::user()->id);
        return $order;
    }

    public function getOrderDetails()
    {
        $orderDetails = OrderDetail::select('order_details.*', 'products.name', 'products.slug', 'image', 'retail_price', 'discount', 'unit_id', 'units.name as unit_name')
            ->join('products', 'products.id', 'product_id')
            ->join('units', 'units.id', 'unit_id');
        return $orderDetails;
    }
}
