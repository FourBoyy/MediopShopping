@extends('admin.master')
@section('title', 'Dashboard')
@section('head', ' Thống kê báo cáo')
@section('description', 'Báo cáo doanh số và hoạt động kinh doanh')
@section('body')
    <div class="section-admin container-fluid">
        <div class="row admin text-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                            <h4 class="text-left text-uppercase"><b>Doanh Thu Hôm Nay</b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet">
                                <div class="col-xs-10 cus-gh-hd-pro">
                                    <h2 class="text-right no-margin" style="font-size: 24px;">
                                        {{ number_format($todayRevenue, 0, ',', '.') }} VNĐ
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-mini">
                                <div style="width: 100%;" class="progress-bar bg-green"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                        <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                            <h4 class="text-left text-uppercase"><b>Tổng Đơn Hàng</b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet">
                                <div class="col-xs-10 cus-gh-hd-pro">
                                    <h2 class="text-right no-margin" style="font-size: 24px;">
                                        {{ number_format($totalOrders, 0, ',', '.') }}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-mini">
                                <div style="width: 100%;" class="progress-bar progress-bar-danger bg-red"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                            <h4 class="text-left text-uppercase"><b>Tổng khách hàng</b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet">
                                <div class="col-xs-10 cus-gh-hd-pro">
                                    <h2 class="text-right no-margin" style="font-size: 24px;">
                                        {{ number_format($totalCustomers, 0, ',', '.') }}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-mini">
                                <div style="width: 100%;" class="progress-bar bg-blue"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                            <h4 class="text-left text-uppercase"><b>Tổng sản phẩm </b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet">
                                <div class="col-xs-10 cus-gh-hd-pro">
                                    <h2 class="text-right no-margin" style="font-size: 24px;">
                                        {{ number_format($totalProducts, 0, ',', '.') }}
                                    </h2>
                                </div>
                            </div>
                            <div class="progress progress-mini">
                                <div style="width: 100%;" class="progress-bar bg-purple"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-sales-area mg-tb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="product-sales-chart">
                        <div class="portlet-title">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="caption pro-sl-hd">
                                        <span class="caption-subject text-uppercase"><b>Doanh Thu & Đơn Hàng Theo
                                                Tháng</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="position: relative; height: 450px; width: 100%; margin-top: 20px;">
                            <canvas id="basiclinechart" style="height: 320px !important;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="white-box analytics-info-cs mg-b-30 res-mg-t-30">
                        <h3 class="box-title">Đơn hàng chờ xử lí </h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <div id="sparklinedash"></div>
                            </li>
                            <li class="text-right sp-cn-r"> <span class="counter sales-sts-ctn"
                                    style="font-size: 24px;">{{ number_format($pendingOrders, 0, ',', '.') }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="white-box analytics-info-cs mg-b-30">
                        <h3 class="box-title"> Đơn hàng đang xử lí</h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <div id="sparklinedash2"></div>
                            </li>
                            <li class="text-right"> <span class="counter sales-sts-ctn"
                                    style="font-size: 24px;">{{ number_format($processingOrders, 0, ',', '.') }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="white-box analytics-info-cs mg-b-30">
                        <h3 class="box-title">Đơn hàng đã hoàn thành</h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <div id="sparklinedash3"></div>
                            </li>
                            <li class="text-right"> <span class="counter sales-sts-ctn"
                                    style="font-size: 24px;">{{ number_format($completedOrders, 0, ',', '.') }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="white-box analytics-info-cs">
                        <h3 class="box-title">Đơn hàng bị hủy</h3>
                        <ul class="list-inline two-part-sp">
                            <li>
                                <div id="sparklinedash4"></div>
                            </li>
                            <li class="text-right"> <span class="counter sales-sts-ctn"
                                    style="font-size: 24px;">{{ number_format($canceledOrders, 0, ',', '.') }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="product-analysis-new-area mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="white-box"
                        style="padding: 20px; border-radius: 4px; background: transparent; border-bottom: none solid rgb(95, 20, 255); min-height: 380px;">
                        <div
                            style="margin-bottom: 25px; border-bottom: 1px solid rgba(55,0,255,0.8); padding-bottom: 15px;">
                            <h3 class="box-title" style="margin: 0; font-size: 16px; color: #ff5252; font-weight: 600;">
                                <i class="fa fa-exclamation-triangle" style="margin-right: 5px;"></i> Sản Phẩm Sắp Hết
                                Hàng
                            </h3>
                        </div>
                        <ul class="list-unstyled" style="margin: 0; padding: 0;">
                            @foreach ($lowStockProducts as $product)
                                <li
                                    style="display: flex; justify-content: space-between; align-items: center; padding: 12px 5px; border-bottom: 2px solid rgba(55, 0, 255, 0.8);">
                                    <div style="display: flex; align-items: center;">
                                        <div
                                            style="width: 40px; height: 40px; background-color: rgba(255,82,82,0.1); border-radius: 4px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                            <i class="fa fa-cube" style="color: #ff5252; font-size: 18px;"></i>
                                        </div>
                                        <div>
                                            <span
                                                style="color: #ffffff; font-weight: 600; display: block; font-size: 14px;">{{ $product->name }}</span>
                                            <span style="color: rgba(255, 255, 255, 0.77); font-size: 12px;">
                                                Danh mục:
                                                {{ $product->category->name }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="label label-danger"
                                            style="background-color: #ff5252; font-weight: bold; padding: 5px 10px; border-radius: 4px; font-size: 12px;">Còn:
                                            {{ $product->stock }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>



                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="white-box"
                        style="padding: 20px; border-radius: 4px; background: transparent; border-bottom: none solid rgba(255,255,255,0.1); min-height: 440px;">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;">
                            <h3 class="box-title" style="margin: 0; font-size: 16px; color: #ffffff; font-weight: 600;">
                                <i class="fa fa-users" style="margin-right: 5px; color: #156cef;"></i> Khách Hàng Mới Đăng
                                Ký
                            </h3>
                        </div>

                        <div class="table-responsive">
                            <table class="table" style="vertical-align: middle; ">
                                <thead>
                                    <tr
                                        style="color: #ffffff; font-weight: bold; border-bottom: 2px solid rgba(255,255,255,0.1);">
                                        <th style="border:none; padding: 12px; font-size: 14px; color: #ffffff;">ID</th>
                                        <th style="border:none; padding: 12px; font-size: 14px; color: #ffffff;">Họ và Tên
                                        </th>
                                        <th style="border:none; padding: 12px; font-size: 14px; color: #ffffff;">Email</th>
                                        <th style="border:none; padding: 12px; font-size: 14px; color: #ffffff;">Ngày Tham
                                            Gia</th>
                                        <th style="border:none; padding: 12px; font-size: 14px; color: #ffffff;"
                                            class="text-center">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newCustomers as $customer)
                                        <tr style="border-bottom: 1px solid rgb(255, 255, 255);">

                                            <td
                                                style="padding: 15px 12px; vertical-align: middle; color: #0663f0; font-weight: bold;">
                                                #{{ $customer->id }}
                                            </td>
                                            <td
                                                style="padding: 15px 12px; vertical-align: middle; color: #ffffff; font-weight: 500;">
                                                {{ $customer->username }}
                                            </td>
                                            <td
                                                style="padding: 15px 12px; vertical-align: middle; color: rgba(255,255,255,0.7);">
                                                {{ $customer->email }}
                                            </td>
                                            <td
                                                style="padding: 15px 12px; vertical-align: middle; color: #ffffff; font-weight: 500;">
                                                {{ $customer->created_at->diffForHumans() }}
                                            </td>
                                            <td style="padding: 15px 12px; vertical-align: middle;" class="text-center">
                                                <a href="#" class="btn btn-primary btn-sm"
                                                    style="background-color: #6576ff; border-color: #6576ff; padding: 5px 15px; border-radius: 4px; font-weight: bold; color: #ffffff;">
                                                    Hồ Sơ
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="product-best-and-low-stock-area mg-b-30">
        <div class="container-fluid">
            <div class="row">

                <!-- 1. KHỐI BEST PRODUCTS (BÊN TRÁI - HIỂN THỊ 3 SẢN PHẨM) -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="white-box"
                        style="padding: 20px; border-radius: 4px; background: transparent; border-bottom: 1px solid rgba(255,255,255,0.1); min-height: 380px;">
                        <div
                            style="margin-bottom: 25px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;">
                            <h3 class="box-title" style="margin: 0; font-size: 16px; color: #ffffff; font-weight: 600;">
                                Best Products (image_ddf6c1.png)</h3>
                        </div>

                        <ul class="list-unstyled text-center"
                            style="margin-top: 20px; padding: 0; display: flex; flex-wrap: wrap;">
                            {{-- @foreach ($bestProducts as $product) --}}
                            <!-- Sản phẩm 1 -->
                            <li style="width: 33.33%; margin-bottom: 20px; padding: 0 10px;">
                                <div style="display: flex; flex-direction: column; align-items: center;">
                                    <div
                                        style="width: 70px; height: 70px; background-color: #e8eaf6; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                                        <i class="fa fa-headphones" style="font-size: 30px; color: #6576ff;"></i>
                                    </div>
                                    <h4
                                        style="font-size: 13px; font-weight: bold; color: #ffffff; margin-bottom: 5px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100%;">
                                        Headphone Blitz</h4>
                                    <div style="color: #ffb300; font-size: 11px; margin-bottom: 5px;">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star-o"></i>
                                    </div>
                                    <span
                                        style="font-size: 12px; color: #ffffff; font-weight: 600; margin-bottom: 12px;">63
                                        Sales</span>
                                    <a href="#" class="btn btn-primary btn-xs"
                                        style="background-color: #6576ff; border-color: #6576ff; border-radius: 4px; padding: 4px 15px; font-weight: bold; color: #ffffff;">Detail</a>
                                </div>
                            </li>

                            {{-- @endforeach --}}
                        </ul>
                    </div>
                </div>

                <!-- 2. KHỐI SẢN PHẨM SẮP HẾT HÀNG (BÊN PHẢI - ĐỊNH DẠNG UL LI DỄ FOREACH) -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="white-box"
                        style="padding: 20px; border-radius: 4px; background: transparent; border-bottom: 1px solid rgba(255,255,255,0.1); min-height: 440px;">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;">
                            <h3 class="box-title" style="margin: 0; font-size: 16px; color: #ffffff; font-weight: 600;">
                                Top 5 sản phẩm bán chạy </h3>
                        </div>

                        <ul class="list-unstyled" style="margin: 0; padding: 0;">
                            @foreach ($topProducts as $product)
                                <li
                                    style="display: flex; justify-content: space-between; align-items: center; padding: 15px 5px; border-bottom: 1px solid rgba(255,255,255,0.05);">
                                    <div style="display: flex; align-items: center;">
                                        {{-- Icon khối vuông đại diện sản phẩm --}}
                                        <div
                                            style="width: 40px; height: 40px; background-color: rgba(101,118,255,0.1); border-radius: 6px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                            <i class="fa fa-cube" style="font-size: 20px; color: #6576ff;"></i>
                                        </div>
                                        {{-- Tên sản phẩm màu trắng nổi bật --}}
                                        <span style="color: #ffffff; font-weight: 600; font-size: 14px;">
                                            {{ $product->name }}
                                        </span>
                                    </div>

                                    {{-- Số lượng đã bán hiển thị dạng Badge nổi bật ở bên phải --}}
                                    <div class="text-right">
                                        <span class="badge bg-green"
                                            style="background-color: #2ecb71; padding: 6px 12px; font-weight: bold; font-size: 12px; border-radius: 4px;">
                                            Đã bán: {{ $product->total_sales }}
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
@section('scripts')
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>

<script>
    window.chartRevenueData = @json($revenueChartData);
    window.chartOrdersData = @json($ordersChartData);
</script>

<script src="{{ asset('assets/js/charts/line-chart.js') }}"></script>
@endsection
@endsection
@endsection
