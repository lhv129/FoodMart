<?php

namespace App\Providers;

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
        }else{
            $totalWishList = 0;
        }
        $totalCart = 0;
        // Logic lấy dữ liệu cho topbar
        return [
            'user' => $user,
            'totalWishList' => $totalWishList,
            'totalCart' => $totalCart,
            'categories' => $categories
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
