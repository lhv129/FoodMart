<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin/categories/index', compact('categories'));
    }

    public function create()
    {
        return view('admin/categories/create');
    }

    public function store(StoreCategoryRequest $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Tạo ngẫu nhiên tên ảnh 12 kí tự
            $imageName = Str::random(12) . "." . $file->getClientOriginalExtension();
            // Đường dẫn ảnh
            $imageDirectory = 'images/categories/';

            $file->move($imageDirectory, $imageName);
            $path_image   = 'http://127.0.0.1:8000/' . ($imageDirectory . $imageName);
        }

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $path_image,
            'fileName' => $imageName,
        ]);

        toast('Thêm mới thành công', 'success');
        return redirect('admin/danh-muc-san-pham');
    }

    public function edit($slug)
    {
        $category = Category::select('categories.*')->where('slug', $slug)->first();
        return view('admin/categories/edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Đường dẫn ảnh
            $imageDirectory = 'images/categories/';
            // Xóa ảnh nếu ảnh cũ
            File::delete($imageDirectory . $category->fileName);
            // Tạo ngẫu nhiên tên ảnh 12 kí tự
            $imageName = Str::random(12) . "." . $file->getClientOriginalExtension();

            $file->move($imageDirectory, $imageName);

            $path_image   = 'http://127.0.0.1:8000/' . ($imageDirectory . $imageName);
        } else {
            $path_image = $category->image;
        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $path_image,
            'fileName' => $imageName ?? $category->fileName,
        ]);

        toast('Cập nhật thành công', 'success');
        return redirect('admin/danh-muc-san-pham');
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();

        // Đường dẫn ảnh
        $imageDirectory = 'images/categories/';
        // Xóa sản phẩm thì xóa luôn ảnh sản phẩm đó
        File::delete($imageDirectory . $category->fileName);

        $category->delete();

        toast('Xóa thành công', 'success');
        return redirect('admin/danh-muc-san-pham');
    }
}
