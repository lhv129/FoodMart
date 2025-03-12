<?php

namespace App\Http\Controllers\admin;

use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return view('admin/suppliers/index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin/suppliers/create');
    }

    public function store(StoreSupplierRequest $request)
    {
        Supplier::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'slug' => Str::slug($request->name),
        ]);

        toast('Thêm mới thành công','success');
        return redirect('admin/nha-cung-cap');
    }

    public function edit($slug)
    {
        $supplier = Supplier::select('suppliers.*')->where('slug', $slug)->first();
        return view('admin/suppliers/edit', compact('supplier'));
    }

    public function update(UpdateSupplierRequest $request, $id)
    {
        $supplier = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];
        Supplier::where('id', $id)->update($supplier);

        toast('Cập nhật thành công','success');
        return redirect('admin/nha-cung-cap');
    }

    public function delete($slug)
    {
        Supplier::where('slug', $slug)->delete();

        toast('Xóa thành công','success');
        return redirect('admin/nha-cung-cap');
    }
}
