<?php

namespace App\Http\Controllers\admin;

use App\Models\Unit;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('products.*', 'categories.name AS category_name', 'units.name AS unit_name')
            ->join('categories', 'categories.id', 'category_id')
            ->join('units', 'units.id', 'unit_id')
            ->paginate(10);
        // dd($products);
        return view('admin/products/index', compact('products'));
    }

    public function create()
    {
        $units = Unit::all();
        $categories = Category::all();
        return view('admin/products/create', compact('units', 'categories'));
    }

    public function store(StoreProductRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Tạo ngẫu nhiên tên ảnh 12 kí tự
            $imageName = Str::random(12) . "." . $file->getClientOriginalExtension();
            // Đường dẫn ảnh
            $imageDirectory = 'images/products/';

            $file->move($imageDirectory, $imageName);
            $path_image   = 'http://127.0.0.1:8000/' . ($imageDirectory . $imageName);

            $product = Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'image' => $path_image,
                'fileImage' => $imageName,
                'unit_id' => $request->unit_id,
                'entry_price' => $request->entry_price,
                'retail_price' => $request->retail_price,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
            ]);
            return redirect('admin/san-pham')->with('message', 'Thêm mới thành công');
        }
    }

    public function edit($slug)
    {
        $units = Unit::all();
        $categories = Category::all();
        $product = Product::select('products.*')->where('slug', $slug)->first();
        return view('admin/products/edit', compact('units', 'categories', 'product'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Đường dẫn ảnh
            $imageDirectory = 'images/products/';
            // Xóa ảnh nếu ảnh cũ
            File::delete($imageDirectory . $product->fileName);
            // Tạo ngẫu nhiên tên ảnh 12 kí tự
            $imageName = Str::random(12) . "." . $file->getClientOriginalExtension();

            $file->move($imageDirectory, $imageName);

            $path_image   = 'http://127.0.0.1:8000/' . ($imageDirectory . $imageName);
        } else {
            $path_image = $product->image;
        }

        $product ->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $path_image,
            'fileImage' => $imageName ?? $product->fileImage,
            'unit_id' => $request->unit_id,
            'entry_price' => $request->entry_price,
            'retail_price' => $request->retail_price,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);
        return redirect('admin/san-pham')->with('message', 'Chỉnh sửa sản phẩm thành công');
    }

    public function delete($slug) {
        $product = Product::where('slug',$slug)->first();
        // Đường dẫn ảnh
        $imageDirectory = 'images/products/';
        // Xóa sản phẩm thì xóa luôn ảnh sản phẩm đó
        File::delete($imageDirectory . $product->fileImage);

        $product->delete();

        return redirect('admin/san-pham')->with('message', 'Xóa sản phẩm thành công');
    }
}
