<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Payment_method;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $payments = Payment_method::paginate(10);
        return view('admin/payments/index', compact('payments'));
    }

    public function create()
    {
        return view('admin/payments/create');
    }

    public function store(StorePaymentMethodRequest $request)
    {
        Payment_method::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        toast('Thêm mới thành công','success');
        return redirect('admin/phuong-thuc-thanh-toan');
    }

    public function edit($slug)
    {
        $payment = Payment_method::select('payment_methods.*')->where('slug', $slug)->first();
        return view('admin/payments/edit', compact('payment'));
    }

    public function update(UpdatePaymentMethodRequest $request, $id)
    {
        $payment = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];
        Payment_method::where('id', $id)->update($payment);

        toast('Cập nhật thành công','success');
        return redirect('admin/phuong-thuc-thanh-toan');
    }

    public function delete($slug)
    {
        Payment_method::where('slug', $slug)->delete();

        toast('Xóa thành công','success');
        return redirect('admin/phuong-thuc-thanh-toan');
    }
}
