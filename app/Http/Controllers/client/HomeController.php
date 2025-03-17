<?php

namespace App\Http\Controllers\client;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::select('products.*','categories.name AS category_name')
        ->join('categories','categories.id','category_id')
        ->paginate(10);
        $topSellingProducts = Product::getTopSellingProducts();
        return view('client/home/index',compact('categories','products','topSellingProducts'));
    }

    
}
