<?php

namespace App\Http\Controllers\client;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index() {
        $wishlists = Wishlist::select('wishlists.*','products.name','products.image','retail_price','discount','warehouses.quantity')
        ->join('products','products.id','wishlists.product_id')
        ->join('warehouses','warehouses.product_id','wishlists.product_id')
        ->where('wishlists.user_id',Auth::user()->id)
        ->paginate(10);
        return view('client/wishlists/index',compact('wishlists'));
    }

    public function store($slug){
        $product = Product::where('slug',$slug)->first();

        //Kiểm tra xem mục yêu thích của bạn đã có sản phẩm đó chưa
        $productInWishlist = Wishlist::where('product_id',$product->id)->first();
        if($productInWishlist){
            toast('Sản phẩm này đã có trong mục yêu thích của bạn','success');
            return back();
        }
        // Thêm vào mục ưa thích
        Wishlist::create([
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
        ]);

        toast('Đã thêm sản phẩm vào mục yêu thích','success');
        return back();
    }

    public function delete($id){
        $productInWishlist = Wishlist::find($id);
        $productInWishlist->delete();

        toast('Xóa thành công','success');
        return back();
    }
}
