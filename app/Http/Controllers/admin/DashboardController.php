<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\GoodReceiptNote;
use App\Models\GoodDeliveryNote;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        //BarChart
        $TotalBarChart = [];
        $datesBarChart = [];

        $today = Carbon::now()->toDateString();
        $startDate = Carbon::now()->subDays(6)->toDateString();
        for ($dateBarChart = $startDate; $dateBarChart <= $today; $dateBarChart = Carbon::parse($dateBarChart)->addDay()->toDateString()) {
            $datesBarChart[] = $dateBarChart;
        }

        foreach ($datesBarChart as $dateBarChart) {
            $orders = Order::whereDate('created_at', $dateBarChart)
                ->where('status', 'success')
                ->sum('total_price');

            $delivery = GoodDeliveryNote::whereDate('created_at', $dateBarChart)
                ->where('status', 'success')
                ->sum('total_price');

            $totalBarChart = $orders + $delivery;

            $dayMonthBarChart = Carbon::parse($dateBarChart)->format('d-m'); // Lấy ngày và tháng
            $TotalBarChart[] = [
                'date' => $dayMonthBarChart, // Sử dụng ngày tháng đã định dạng
                'total' => $totalBarChart,
            ];
        }
        //End BarChart

        // Area Chart
        $timeRange = $request->time_range;
        if ($timeRange === null || $timeRange === "30") {
            $Totals = [];
            $dates = [];

            $today = Carbon::now()->toDateString();
            $startDate = Carbon::now()->subDays(29)->toDateString();
            for ($date = $startDate; $date <= $today; $date = Carbon::parse($date)->addDay()->toDateString()) {
                $dates[] = $date;
            }

            foreach ($dates as $date) {
                $orders = Order::whereDate('created_at', $date)
                    ->where('status', 'success')
                    ->sum('total_price');

                $delivery = GoodDeliveryNote::whereDate('created_at', $date)
                    ->where('status', 'success')
                    ->sum('total_price');

                $total = $orders + $delivery;
                $dayMonth = Carbon::parse($date)->format('d-m'); // Lấy ngày và tháng

                $Totals[] = [
                    'date' => $dayMonth, // Sử dụng ngày tháng đã định dạng
                    'total' => $total,
                ];
            }
        } elseif ($timeRange === "90") {
            $Totals = [];
            $today = Carbon::now();

            for ($i = 2; $i >= 0; $i--) { // Lặp qua 3 tháng gần nhất
                $month = $today->copy()->subMonths($i); // Lấy tháng thứ i tính từ tháng hiện tại
                $monthStart = $month->copy()->startOfMonth()->toDateString(); // Lấy ngày đầu tháng
                $monthEnd = $month->copy()->endOfMonth()->toDateString(); // Lấy ngày cuối tháng

                $orders = Order::whereDate('created_at', '>=', $monthStart)
                    ->whereDate('created_at', '<=', $monthEnd)
                    ->where('status', 'success')
                    ->sum('total_price');

                $delivery = GoodDeliveryNote::whereDate('created_at', '>=', $monthStart)
                    ->whereDate('created_at', '<=', $monthEnd)
                    ->where('status', 'success')
                    ->sum('total_price');

                $total = $orders + $delivery;

                $Totals[] = [
                    'date' => $month->format('Y-m'), // Lấy năm và tháng
                    'total' => $total,
                ];
            }
        } elseif ($timeRange === "180") {
            $Totals = [];
            $today = Carbon::now();

            for ($i = 5; $i >= 0; $i--) { // Lặp qua 3 tháng gần nhất
                $month = $today->copy()->subMonths($i); // Lấy tháng thứ i tính từ tháng hiện tại
                $monthStart = $month->copy()->startOfMonth()->toDateString(); // Lấy ngày đầu tháng
                $monthEnd = $month->copy()->endOfMonth()->toDateString(); // Lấy ngày cuối tháng

                $orders = Order::whereDate('created_at', '>=', $monthStart)
                    ->whereDate('created_at', '<=', $monthEnd)
                    ->where('status', 'Success')
                    ->sum('total_price');

                $delivery = GoodDeliveryNote::whereDate('created_at', '>=', $monthStart)
                    ->whereDate('created_at', '<=', $monthEnd)
                    ->where('status', 'Success')
                    ->sum('total_price');

                $total = $orders + $delivery;

                $Totals[] = [
                    'date' => $month->format('Y-m'), // Lấy năm và tháng
                    'total' => $total,
                ];
            }
        } elseif ($timeRange === "360") {
            $Totals = [];
            $today = Carbon::now();

            for ($i = 11; $i >= 0; $i--) { // Lặp qua 3 tháng gần nhất
                $month = $today->copy()->subMonths($i); // Lấy tháng thứ i tính từ tháng hiện tại
                $monthStart = $month->copy()->startOfMonth()->toDateString(); // Lấy ngày đầu tháng
                $monthEnd = $month->copy()->endOfMonth()->toDateString(); // Lấy ngày cuối tháng

                $orders = Order::whereDate('created_at', '>=', $monthStart)
                    ->whereDate('created_at', '<=', $monthEnd)
                    ->sum('total_price');

                $delivery = GoodDeliveryNote::whereDate('created_at', '>=', $monthStart)
                    ->whereDate('created_at', '<=', $monthEnd)
                    ->where('status', 'Success')
                    ->sum('total_price');

                $total = $orders + $delivery;

                $Totals[] = [
                    'date' => $month->format('Y-m'), // Lấy năm và tháng
                    'total' => $total,
                ];
            }
        }

        //Tính tổng nhập hàng theo tháng
        $TotalImport = [];
        $todayImport = Carbon::now();

        for ($i = 11; $i >= 0; $i--) { // Lặp qua 3 tháng gần nhất
            $monthImport = $todayImport->copy()->subMonths($i); // Lấy tháng thứ i tính từ tháng hiện tại
            $monthImportStart = $monthImport->copy()->startOfMonth()->toDateString(); // Lấy ngày đầu tháng
            $monthImportEnd = $monthImport->copy()->endOfMonth()->toDateString(); // Lấy ngày cuối tháng

            $total = GoodReceiptNote::whereDate('created_at', '>=', $monthImportStart)
                ->whereDate('created_at', '<=', $monthImportEnd)
                ->sum('total_price');


            $TotalImport[] = [
                'date' => $monthImport->format('Y-m'), // Lấy năm và tháng
                'total' => $total,
            ];
        }


        // Lấy tháng và năm hiện tại
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Tính tổng thu nhập của tháng và năm hiện tại
        $totalOrder = Order::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('status', 'Success')
            ->sum('total_price');
        $totalDelivery = GoodDeliveryNote::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('status', 'Success')
            ->sum('total_price');

        $totalImportMonthly = GoodReceiptNote::select('*')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('status', 'Success')
            ->sum('total_price');

        $totalMonthly = $totalOrder + $totalDelivery;

        $userCount = User::where('role_id', 3)
            ->count();
        return view('admin/dashboard/dashboard', ['dailyTotals' => $Totals, 'timeRange' => $timeRange, 'TotalBarChart' => $TotalBarChart, 'totalMonthly' => $totalMonthly, 'totalImportMonthly' => $totalImportMonthly, 'userCount' => $userCount,'TotalImport' => $TotalImport]);
    }
}
