<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\GoodReceiptNote;
use App\Models\GoodDeliveryNote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TopBarServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('admin.blocks.topbar', function ($view) {
            $data = $this->getAlertForTopBar();
            $view->with('topBarData', $data);
        });
    }

    private function getAlertForTopBar()
    {
        //Đếm ra số lượng của đơn chờ xác nhận
        $pendingOrderCount = Order::whereIn('status', ['Pending','Paid'])
        ->count();

        $pendingOrderList = Order::whereIn('status', ['Pending','Paid'])
        ->orderBy('id','ASC')
        ->take(3)
        ->get();

        //Đếm ra số lượng của đơn nhập hàng nếu chưa chưa xác nhận nhập kho
        $goodReceiptNoteCount = GoodReceiptNote::where('status','Pending')
        ->where('user_id',Auth::user()->id)
        ->count();

        $goodReceiptNoteList = GoodReceiptNote::whereIn('status', ['Pending'])
        ->where('user_id',Auth::user()->id)
        ->orderBy('id','ASC')
        ->take(3)
        ->get();

        //Đếm ra số lượng của đơn bán hàng nếu chưa chưa xác nhận xuất kho
        $goodDeliveryNoteCount = GoodDeliveryNote::where('status','Pending')
        ->where('user_id',Auth::user()->id)
        ->count();

        $goodDeliveryNoteList = GoodDeliveryNote::whereIn('status', ['Pending'])
        ->where('user_id',Auth::user()->id)
        ->orderBy('id','ASC')
        ->take(3)
        ->get();

        // Logic lấy dữ liệu cho topbar
        return [
            'pendingOrderCount' => $pendingOrderCount,
            'pendingOrderList' => $pendingOrderList,
            'goodReceiptNoteCount' => $goodReceiptNoteCount,
            'goodReceiptNoteList' => $goodReceiptNoteList,
            'goodDeliveryNoteCount' => $goodDeliveryNoteCount,
            'goodDeliveryNoteList' => $goodDeliveryNoteList,
        ];
    }
}
