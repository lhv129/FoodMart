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

        //Nếu có số lượng sản phẩm thì lấy ra, không thì set mặc định cho nó = 1
        $priceProduct = $product->retail_price - $product->discount;
        if ($request->quantity) {
            $quantity = $request->quantity;
        } else {
            $quantity = 1;
        }
        //Kiểm tra xem sản phẩm có trong cart chưa
        $productInCart = Cart::where('product_id', $product->id)->first();
        if ($productInCart) {
            $newQuantity = $productInCart->quantity + $quantity;
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

    public function update(Request $request)
    {
        if ($request->btn_delete) {
            $productInCart = Cart::find($request->btn_delete);
            $productInCart->delete();
            toast('Xóa sản phẩm thành công', 'success');
            return back();
        } elseif ($request->btn_update) {
            $carts = $request->cart;
            if (!$carts) {
                toast('Bạn chưa có sản phẩm nào trong giỏ hàng', 'error');
                return back();
            }
            foreach ($carts as $index => $cart) {
                $productInCart = Cart::find($index);
                $product = Product::select('id', 'retail_price', 'discount')
                    ->where('id', $productInCart->product_id)
                    ->first();

                $quantity = $cart['quantity'];
                // Nếu số lượng sản phẩm nhỏ hơn 0 thì xóa sản phẩm ra khỏi giỏ hàng
                if ($quantity <= 0) {
                    Cart::where('id', $index)->delete();
                }
                // Nếu > 0 thì cập nhật lại số lượng và đơn giá (sub_total)
                $productInCart->update([
                    'quantity' => $quantity,
                    'sub_total' => $quantity * ($product->retail_price - $product->discount)
                ]);
            }
            toast('Cập nhật giỏ hàng thành công', 'success');
            return back();
        }
    }
}
