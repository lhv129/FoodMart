<?php

namespace App\Http\Controllers\client;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Warehouse;
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

        //Lấy ra sản phẩm trong kho
        $productInWarehouse = Warehouse::where('product_id', $product->id)->first();

        //B1. Kiểm tra số lượng ô input có vượt quá số lượng trong kho không
        if ($quantity > $productInWarehouse->quantity) {
            toast("Sản phẩm này chỉ còn số lượng trong kho là $productInWarehouse->quantity", 'error');
            return back();
        }

        //Kiểm tra xem sản phẩm có trong giỏ hàng chưa
        $productInCart = Cart::where('product_id', $product->id)
        ->where('user_id',Auth::user()->id)
        ->first();
        if ($productInCart) {
            //Nếu số lượng thêm vào giỏ + số lượng có sẵn trong giỏ lớn hơn số lượng trong kho thì trả về lỗi
            if ($productInCart->quantity + $quantity > $productInWarehouse->quantity) {
                toast("Sản phẩm này đã có trong giỏ hàng của bạn và chỉ còn số lượng trong kho là $productInWarehouse->quantity", 'error');
                return back();
            }

            //Nếu không thì cập nhật lại giỏ hàng
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
                $product = Product::select('id','name','retail_price', 'discount')
                    ->where('id', $productInCart->product_id)
                    ->first();

                $quantity = $cart['quantity'];

                $productInWarehouse = Warehouse::where('product_id', $product->id)->first();
                if ($quantity > $productInWarehouse->quantity) {
                    toast("$product->name chỉ còn $productInWarehouse->quantity số lượng trong kho", 'error');
                    return back();
                }

                // Nếu số lượng sản phẩm nhỏ hơn 0 thì xóa sản phẩm ra khỏi giỏ hàng
                if ($quantity <= 0) {
                    Cart::where('id', $index)->delete();
                }
                // Nếu > 0 thì và nhỏ hơn số lượng trong kho cập nhật lại số lượng và đơn giá (sub_total)
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
