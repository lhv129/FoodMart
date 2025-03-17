<?php

namespace App\Providers;

use App\Models\Category;
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
    }

    private function getDataForHeader()
    {
        $categories = Category::all();
        // Logic lấy dữ liệu cho topbar
        return [
            // 'userName' => auth()->user()->name,
            'categories' => $categories
        ];
    }
}
