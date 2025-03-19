<?php

namespace App\Http\Controllers\client;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {

        $carts = Cart::select('carts.*', 'products.name', 'products.image', 'retail_price', 'discount', 'warehouses.quantity')
            ->join('products', 'products.id', 'carts.product_id')
            ->join('warehouses', 'warehouses.product_id', 'carts.product_id')
            ->where('carts.user_id', Auth::user()->id)
            ->paginate(10);

        return view('client/orders.index',compact('carts'));
    }
}
