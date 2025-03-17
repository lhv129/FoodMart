<?php

namespace App\Http\Controllers\client;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getProductsInCategory($slug)
    {
        //Để truyền vào header
        $categories = Category::all();

        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $products = Product::select('products.*')
                ->where('category_id', $category->id)
                ->get();
            return view('client/products/getProductInCategory', compact('products', 'categories'));
        }else{
            toast('Danh mục sản phẩm này không tồn tại', 'error');
            return back();
        }
    }


    public function detail($slug)
    {
        //Để truyền vào header
        $categories = Category::all();

        // select đến warehouses.quantity sẽ gặp lỗi nếu có sản phẩm nhưng trong kho chưa có bản khi của sản phẩm đó.
        $product = Product::select('products.*', 'categories.name AS category_name', 'units.name as unit_name', 'warehouses.quantity')
            ->join('categories', 'categories.id', 'category_id')
            ->join('units', 'units.id', 'unit_id')
            ->join('warehouses', 'warehouses.product_id', 'products.id')
            ->where('products.slug', $slug)
            ->first();
        if ($product) {
            //Lấy ra các sản phẩm liên quan
            $products = Product::select('products.*', 'categories.name AS category_name')
                ->join('categories', 'categories.id', 'category_id')
                ->where('category_id', $product->id)
                ->paginate(10);
            return view('client/products/detail', compact('product', 'categories', 'products'));
        } else {
            toast('Sản phẩm này không tồn tại', 'error');
            return back();
        }
    }
}
