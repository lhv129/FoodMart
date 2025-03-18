<?php

namespace App\Http\Controllers\client;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request, $slug)
    {
        // Lấy ra sản phẩm
        $product = Product::where('slug', $slug)
            ->first();
        $priceProduct = $product->retail_price - $product->discount;
        $quantity = $request->quantity ?? 1;

        //Kiểm tra xem sản phẩm có trong cart chưa
        $productInCart = Cart::where('product_id', $product->id)->first();
        if ($productInCart) {
            $newQuantity = $productInCart->quantity + 1;
            $productInCart->update([
                'quantity' => $newQuantity,
                'sub_total' => $newQuantity * $priceProduct,
            ]);
            toast('Thêm sản phẩm thành công', 'success');
            return back();
        } else {
            // Thêm vào giỏ hàng
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'sub_total' => $quantity * $priceProduct
            ]);

            toast('Đã thêm sản phẩm vào giỏ hàng', 'success');
            return back();
        }
    }

    public function delete($id){
        $cart = Cart::find($id);
        $cart->delete();

        toast('Xóa sản phẩm thành công', 'success');
        return back();
    }
}
