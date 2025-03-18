<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function boot()
    {
        View::composer('client.blocks.header', function ($view) {
            $data = $this->getDataForHeader();
            $view->with('headerData', $data);
        });

        // Composer cho footer
        View::composer('client.blocks.footer', function ($view) {
            $data = $this->getDataForFooter(); // Hàm lấy dữ liệu cho footer
            $view->with('footerData', $data);
        });
    }

    private function getDataForHeader()
    {
        $categories = Category::all();
        $user = auth()->check() ? auth()->user() : null; // Kiểm tra đăng nhập
        if($user){
            $totalWishList = Wishlist::select('wishlists.*')
            ->where('user_id',$user->id)
            ->count();

            $totalCart = Cart::select('carts.*')
            ->where('user_id',$user->id)
            ->count();

            $carts = Cart::select('carts.*','products.name','products.image','products.retail_price','products.discount','products.slug','unit_id','units.name as unit_name')
            ->join('products','products.id','carts.product_id')
            ->join('units','units.id','unit_id')
            ->where('user_id',$user->id)
            ->get();
        }else{
            $totalCart = 0;
            $totalWishList = 0;
        }
        
        // Logic lấy dữ liệu cho topbar
        return [
            'user' => $user,
            'totalWishList' => $totalWishList,
            'totalCart' => $totalCart,
            'categories' => $categories,
            'carts' => $carts ?? null
        ];
    }

    private function getDataForFooter()
    {
        $categories = Category::all();
        // Logic lấy dữ liệu cho footer
        return [
            'categories' => $categories,
        ];
    }
}
