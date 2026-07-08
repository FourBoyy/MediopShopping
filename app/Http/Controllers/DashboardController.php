<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //4 Ô NGANG PHÍA TRÊN 
        $todayRevenue = Order::whereDate('created_at', today())
            ->where('status', 'completed')
            ->withSum('orderDetails', 'price')
            ->get()
            ->sum('order_details_sum_price');
        $totalOrders = Order::count();
        $totalCustomers = User::where('roleId', '2')->count();
        $totalProducts = Product::count();
        // XỬ LÝ SỐ LƯỢNG ĐƠN HÀNG THEO TRẠNG THÁI
        $pendingOrders = Order::where('status', 'pending')->count();
        $processingOrders = Order::where('status', 'processing')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $canceledOrders = Order::where('status', 'canceled')->count();


        //  XỬ LÝ KHÁCH HÀNG MỚI 
        $newCustomers = User::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        //SẢN PHẨM CÒN HÀNG ÍT
        $lowStockProducts = Product::with('category')
            ->where('stock', '<=', 25)
            ->orderBy('stock', 'asc')
            ->take(10)
            ->get();

        // TOP 5 PRODUCTS BẰNG 
        $topProducts = Product::with(['orderDetails.order'])
            ->get()
            ->map(function ($product) {
                $completedDetails = $product->orderDetails->filter(function ($detail) {
                    return $detail->order && $detail->order->status === 'completed';
                });

                $product->total_sales = $completedDetails->sum('quantity');

                return $product;
            })
            ->sortByDesc('total_sales')
            ->take(5);

        //BIỂU ĐỒ DOANH THU THEO THÁNG
        $currentYear = Carbon::now()->year; // Năm hiện tại (2026)
        
        // Khởi tạo mảng 12 tháng với giá trị ban đầu bằng 0
        $monthlyRevenue = array_fill(1, 12, 0);
        $monthlyOrders = array_fill(1, 12, 0);

        // Query gom nhóm số lượng đơn hàng theo tháng
        $salesData = Order::with('orderDetails')
            ->whereYear('created_at', $currentYear)
            ->where('status', 'completed')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(id) as total_orders')
            )
            ->groupBy('month')
            ->get();

        foreach ($salesData as $data) {
            $monthlyOrders[$data->month] = $data->total_orders;
            
            // Tính tổng tiền tài chính của các đơn hàng trong tháng đó
            $ordersInMonth = Order::with('orderDetails')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $data->month)
                ->where('status', 'completed')
                ->get();
                
            $monthlyRevenue[$data->month] = $ordersInMonth->sum(function($order) {
                return $order->orderDetails->sum(fn($d) => $d->quantity * $d->price);
            });
        }

        // Chuyển thành mảng phẳng để chuẩn bị truyền cho Javascript
        $revenueChartData = array_values($monthlyRevenue); 
        $ordersChartData = array_values($monthlyOrders);
        return view('admin.dashboard', compact(
            'todayRevenue', 'totalOrders', 'totalCustomers',
             'totalProducts', 'pendingOrders', 'processingOrders', 
             'completedOrders', 'canceledOrders', 'lowStockProducts', 
             'newCustomers', 'topProducts', 'revenueChartData', 'ordersChartData'));
    }
}
