@extends('admin.master')
@section('title', 'Order List')
@section('head', 'Order List')
@section('description',
    'Add, edit,delete, and manage orders in the Mediopshopping admin panel. View order details,
    status, and customer information.')
@section('body')

    <div class="product-cart-area mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-cart-inner">
                        <div id="example-basic">
                            <section>
                                <h3 class="product-cart-dn">Shopping</h3>
                                <div class="product-list-cart">
                                    <div class="product-status-wrap border-pdt-ct">
                                        <div class="order-steps-filter" style="margin-bottom: 25px;">
                                           
                                            <div style="display: flex; gap: 12px; flex-wrap: wrap; width: 100%; " {{ $currentStatus = request('status', 'all') }}>
                                                <a href="{{ url()->current() }}"
                                                    style="flex: 1; min-width: 150px; padding: 15px; text-decoration: none; border-radius: 6px; font-weight: bold; transition: all 0.3s;
                                                        {{ $currentStatus == 'all' ? 'background: #fff; color: #152036;' : 'background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1);' }}">
                                                    1. Tất cả đơn hàng
                                                </a>

                                                <a href="{{ url()->current() . '?status=pending' }}"
                                                    style="flex: 1; min-width: 150px; padding: 15px; text-decoration: none; border-radius: 6px; font-weight: bold; transition: all 0.3s;
                                                        {{ $currentStatus == 'pending' ? 'background: #fff; color: #152036;' : 'background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1);' }}">
                                                    2. Chờ xử lý
                                                </a>

                                                <a href="{{ url()->current() . '?status=processing' }}"
                                                    style="flex: 1; min-width: 150px; padding: 15px; text-decoration: none; border-radius: 6px; font-weight: bold; transition: all 0.3s;
                                                        {{ $currentStatus == 'processing' ? 'background: #fff; color: #152036;' : 'background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1);' }}">
                                                    3. Đang xử lý
                                                </a>

                                                <a href="{{ url()->current() . '?status=completed' }}"
                                                    style="flex: 1; min-width: 150px; padding: 15px; text-decoration: none; border-radius: 6px; font-weight: bold; transition: all 0.3s;
                                                        {{ $currentStatus == 'completed' ? 'background: #fff; color: #152036;' : 'background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1);' }}">
                                                    4. Đã hoàn thành
                                                </a>

                                                <a href="{{ url()->current() . '?status=canceled' }}"
                                                    style="flex: 1; min-width: 150px; padding: 15px; text-decoration: none; border-radius: 6px; font-weight: bold; transition: all 0.3s;
                                                        {{ $currentStatus == 'canceled' ? 'background: #fff; color: #152036;' : 'background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1);' }}">
                                                    5. Đã hủy
                                                </a>
                                            </div>
                                        </div>
                                        <table>
                                            <tr>
                                                <th>UserId</th>
                                                <th>Username</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td><span class="text-success">{{ $order->userId }}</span></td>
                                                    <td><span class="text-success">{{ $order->user->username }}</span></td>
                                                    <td>{{ $order->status }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>{{ $order->updated_at }}</td>
                                                    <td>
                                                        <button type="button" data-toggle="tooltip" title="View"
                                                            class="pd-setting-ed"
                                                            onclick="window.location.href='{{ route('admin.order.detail', $order->id) }}'">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </button>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        {{ $orders->links('components.pagination') }}
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
