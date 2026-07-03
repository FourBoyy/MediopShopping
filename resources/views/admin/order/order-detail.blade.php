@extends('admin.master')
@section('title', 'Order Detail')
@section('head', 'Order Detail')
@section('description', 'View detailed information for a specific order and update its fulfillment status.')

@section('body')
    <div class="product-cart-area mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-cart-inner">
                        <div id="example-basic">

                            <section>
                                <h3 class="product-cart-dn">Order Detail #{{ $order->id }}</h3>

                                <div class="product-list-cart">
                                    <div class="product-status-wrap border-pdt-ct">

                                        <div
                                            style="margin-bottom: 25px; color: #fff; background: rgba(255,255,255,0.05); padding: 20px; border-radius: 4px;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><strong>Tên người nhận:</strong> {{ $order->user->username }}</p>
                                                    <p><strong>ID người nhận:</strong> <span
                                                            class="text-success">{{ $order->userId }}</span></p>
                                                    <p><strong>Ngày đặt hàng:</strong> {{ $order->created_at }}</p>
                                                </div>

                                                <div class="col-md-6"
                                                    style="border-left: 1px solid rgba(255,255,255,0.1); padding-left: 20px;">
                                                    <form action="{{ route('admin.order.updateStatus', $order->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <label
                                                            style="display: block; margin-bottom: 8px; font-weight: bold;">Trạng
                                                            thái đơn hàng:</label>
                                                        <div style="display: flex; gap: 10px;">
                                                            <select name="status"
                                                                style="background: #152036; color: #fff; border: 1px solid #34495e; padding: 8px 12px; border-radius: 4px; flex-grow: 1; cursor: pointer;">
                                                                <option value="pending"
                                                                    {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ
                                                                    xử lý</option>
                                                                <option value="processing"
                                                                    {{ $order->status == 'processing' ? 'selected' : '' }}>
                                                                    Đang xử lý</option>
                                                                <option value="completed"
                                                                    {{ $order->status == 'completed' ? 'selected' : '' }}>Đã
                                                                    hoàn thành</option>
                                                                <option value="canceled"
                                                                    {{ $order->status == 'canceled' ? 'selected' : '' }}>Đã
                                                                    hủy</option>
                                                            </select>

                                                            <button type="submit"
                                                                style="background: #27ae60; color: #fff; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer; font-weight: bold;">
                                                                <i class="fa fa-save"></i> Cập nhật
                                                            </button>
                                                        </div>
                                                    </form>
                                                    @if (session('success'))
                                                        <div id="success-alert"
                                                            class="mt-2 flex items-center justify-center gap-2 text-green-500 text-xs font-semibold transition-all duration-500">
                                                            <span>{{ session('success') }}</span>
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>

                                        </div>

                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $totalOrderPrice = 0; @endphp
                                                @foreach ($order->orderDetails as $detail)
                                                    @php
                                                        $subtotal = $detail->price * $detail->quantity;
                                                        $totalOrderPrice += $subtotal;
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <h3>{{ $detail->product->name ?? 'Sản phẩm đã xóa' }}</h3>
                                                        </td>
                                                        <td>{{ number_format($detail->price) }}đ</td>
                                                        <td>{{ $detail->quantity }}</td>
                                                        <td><span
                                                                class="text-success">{{ number_format($subtotal) }}đ</span>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <tr style="background: rgba(255,255,255,0.02); font-weight: bold;">
                                                    <td colspan="3" style="text-align: right; padding-right: 20px;">
                                                        <h3>Tổng cộng hóa đơn:</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="text-success" style="font-size: 18px;">
                                                            {{ number_format($totalOrderPrice) }}đ</h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div style="margin-top: 20px;">
                                            <button type="button" class="btn btn-primary"
                                                style="background: #1f2e4e; border: 1px solid #34495e; color: #fff; padding: 6px 12px; cursor: pointer;"
                                                onclick="window.location.href='{{ route('admin.order.list') }}'">
                                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại danh sách
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
