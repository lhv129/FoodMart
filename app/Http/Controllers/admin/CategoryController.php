<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return view('admin/categories/index',compact('categories'));
    }

    public function create(){
        return view('admin/categories/create');
    }

    public function store(StoreCategoryRequest $request){
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return redirect('admin/danh-muc-san-pham')->with('message', 'Thêm mới thành công');
    }

    public function edit($slug){
        $category = Category::select('categories.*')->where('slug',$slug)->first();
        return view('admin/categories/edit',compact('category'));
    }

    public function update(UpdateCategoryRequest $request,$id){
        $category = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];
        Category::where('id',$id)->update($category);
        return redirect('admin/danh-muc-san-pham')->with('message', 'Cập nhật thành công');
    }

    public function delete($slug){
        Category::where('slug',$slug)->delete();
        return redirect('admin/danh-muc-san-pham')->with('message', 'Xóa thành công');
    }
}
