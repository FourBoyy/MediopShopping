<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{ asset('assets/img/logo/logo.png') }}" alt="" /></a>
            <strong><img src="{{ asset('assets/img/logo/logosn.png') }}" alt="" /></strong>
        </div>
        <div class="nalika-profile">
            <div class="profile-dtl">
                <a href="#"><img src="{{ asset('assets/img/notification/4.jpg') }}" alt="" /></a>
                <h2>{{ Auth::user()->username }}</h2>
            </div>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a class="" href="{{ route('dashboard') }}" aria-expanded="false"><i
                                class="icon nalika-pie-chart icon-wrap"></i> <span
                                class="mini-click-non">Dashboard</span></a>
                    </li>
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                                class="icon nalika-mail icon-wrap"></i> <span class="mini-click-non">Quản lí sản
                                phẩm</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href="{{ route('admin.products.list') }}"><span class="mini-sub-pro">Danh sách sản
                                        phẩm</span></a></li>
                            <li><a title="View Mail" href="mailbox-view.html"><span class="mini-sub-pro">Danh mục &
                                        thương hiệu</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="" href="mailbox.html" aria-expanded="false"><i
                                class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Quản lí đơn
                                hàng</span></a>
                    </li>
                    <li>
                        <a class="" href="{{route('admin.user.list')}}" aria-expanded="false"><i
                                class="icon nalika-pie-chart icon-wrap"></i> <span class="mini-click-non">Quản lí khách
                                hàng</span></a>
                    </li>
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                                class="icon nalika-table icon-wrap"></i> <span class="mini-click-non">Quản lí nội dung
                            </span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Peity Charts" href="static-table.html"><span class="mini-sub-pro">Bài viết </span></a></li>
                            <li><a title="Data Table" href="data-table.html"><span class="mini-sub-pro">Trang tĩnh</span></a></li>
                            <li><a title="Data Table" href="data-table.html"><span class="mini-sub-pro">Banner & Giao diện</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                                class="icon nalika-forms icon-wrap"></i> <span class="mini-click-non">Quản lí giao dịch
                            </span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Basic Form Elements" href="basic-form-element.html"><span
                                        class="mini-sub-pro">Bc Form Elements</span></a></li>
                            <li><a title="Advance Form Elements" href="advance-form-element.html"><span
                                        class="mini-sub-pro">Ad Form Elements</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="" href="mailbox.html" aria-expanded="false"><i
                                class="icon nalika-forms icon-wrap"></i> <span class="mini-click-non">Đánh giá & Bình luận
                            </span></a>
                    </li>

                </ul>
            </nav>
        </div>
    </nav>
</div>
