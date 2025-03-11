<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

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
        $unit = $request->all();
        Unit::create($unit);
        return redirect('admin/don-vi')->with('message', 'Thêm mới thành công');
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
            'slug' => $request->slug,
        ];
        Unit::where('id', $id)->update($unit);
        return redirect('admin/don-vi')->with('message', 'Cập nhật thành công');
    }

    public function delete($slug)
    {
        Unit::where('slug', $slug)->delete();
        return redirect('admin/don-vi')->with('message', 'Xóa thành công');
    }
}
