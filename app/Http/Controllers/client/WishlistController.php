<?php

namespace App\Http\Controllers\client;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::select('wishlists.*', 'products.name', 'products.image', 'retail_price', 'discount', 'warehouses.quantity')
            ->join('products', 'products.id', 'wishlists.product_id')
            ->join('warehouses', 'warehouses.product_id', 'wishlists.product_id')
            ->where('wishlists.user_id', Auth::user()->id)
            ->paginate(10);

        $totalWishList = Wishlist::select('wishlists.*')
            ->where('user_id', Auth::user()->id)
            ->count();
        return view('client/wishlists/index', compact('wishlists', 'totalWishList'));
    }

    public function store($slug)
    {
        $product = Product::where('slug', $slug)->first();

        //Kiểm tra xem mục yêu thích của bạn đã có sản phẩm đó chưa
        $productInWishlist = Wishlist::where('product_id', $product->id)
            ->where('user_id', Auth::user()->id)
            ->first();
        if ($productInWishlist) {
            toast('Sản phẩm này đã có trong mục yêu thích của bạn', 'success');
            return back();
        }
        // Thêm vào mục ưa thích
        Wishlist::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
        ]);

        toast('Đã thêm sản phẩm vào mục yêu thích', 'success');
        return back();
    }

    public function createCart($id)
    {
        $wishlist = Wishlist::find($id);
        $product = Product::where('id', $wishlist->product_id)->first();

        $priceProduct = $product->retail_price - $product->discount;
        $quantity = $request->quantity ?? 1;

        //Lấy ra sản phẩm trong kho
        $productInWarehouse = Warehouse::where('product_id', $product->id)->first();

        //Kiểm tra xem sản phẩm có trong cart chưa
        $productInCart = Cart::where('product_id', $product->id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($productInCart) {
            //Nếu số lượng thêm vào giỏ + số lượng có sẵn trong giỏ lớn hơn số lượng trong kho thì trả về lỗi
            if ($productInCart->quantity + $quantity > $productInWarehouse->quantity) {
                toast("Sản phẩm này đã có trong giỏ hàng của bạn và trong kho còn $productInWarehouse->quantity số lượng", 'error');
                return back();
            }
            $newQuantity = $productInCart->quantity + 1;
            $productInCart->update([
                'quantity' => $newQuantity,
                'sub_total' => $newQuantity * $priceProduct,
            ]);

            //Xóa sản phẩm trong mục yêu thích
            $wishlist->delete();

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
            //Xóa sản phẩm trong mục yêu thích
            $wishlist->delete();
            toast('Đã thêm sản phẩm vào giỏ hàng', 'success');
            return back();
        }
    }

    public function delete($id)
    {
        $productInWishlist = Wishlist::find($id);
        $productInWishlist->delete();

        toast('Xóa thành công', 'success');
        return back();
    }
}
