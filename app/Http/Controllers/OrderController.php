<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function orderList(Request $request)
    {
        $query = Order::with('user');
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }
        // Hàm appends(request()->query()) cực kỳ quan trọng: giúp giữ lại bộ lọc trạng thái khi bạn bấm sang Trang 2, Trang 3 ở phần phân trang
        $orders = $query->paginate(10)
                        ->appends($request->query());
        return view('admin.order.order-list', compact('orders'));
    }
    public function orderDetail($id)
    {
        $order = Order::with('orderDetails')->findOrFail($id);
        return view('admin.order.order-detail', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();
        return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }
}
