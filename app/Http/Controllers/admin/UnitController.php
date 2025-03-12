<?php

namespace App\Http\Controllers\admin;

use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::paginate(10);
        return view('admin/units/index', compact('units'));
    }

    public function create()
    {
        return view('admin/units/create');
    }

    public function store(StoreUnitRequest $request)
    {
        Unit::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        toast('Thêm mới thành công','success');
        return redirect('admin/don-vi');
    }

    public function edit($slug)
    {
        $unit = Unit::select('units.*')->where('slug', $slug)->first();
        return view('admin/units/edit', compact('unit'));
    }

    public function update(UpdateUnitRequest $request, $id)
    {
        $unit = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];
        Unit::where('id', $id)->update($unit);

        toast('Cập nhật thành công','success');
        return redirect('admin/don-vi');
    }

    public function delete($slug)
    {
        Unit::where('slug', $slug)->delete();

        toast('Xóa thành công','success');
        return redirect('admin/don-vi');
    }
}
