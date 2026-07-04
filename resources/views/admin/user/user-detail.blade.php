@extends('admin.master')
@section('title', 'User Details')
@section('head','Thông tin chi tiết người dùng')
@section('description','Xem thông tin chi tiết người dùng trong hệ thống.')

@section('body')
<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4 style="color: white; margin-bottom: 20px;">Thông tin chi tiết người dùng</h4>

                    <div class="row">
                        <div class="col-md-4 text-center">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" style="width: 200px; height: 200px; border-radius: 50%; border: 2px solid white;">
                            @else
                                <img src="{{ asset('admin/img/default-avatar.png') }}" alt="Avatar" style="width: 200px; height: 200px; border-radius: 50%; border: 2px solid white;">
                            @endif
                        </div>
                        
                        <div class="col-md-8">
                            <table class="table table-bordered" style="color: white;">
                                <tr>
                                    <th style="width: 30%;">Tên đăng nhập</th>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại</th>
                                    <td>{{ $user->phonenumber }}</td>
                                </tr>
                                <tr>
                                    <th>Vai trò</th>
                                    <td><span class="label label-info">{{ $user->role->name ?? 'N/A' }}</span></td>
                                </tr>
                                <tr>
                                    <th>Ngày tạo</th>
                                    <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            </table>

                            <div class="form-group" style="margin-top: 20px;">
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary waves-effect waves-light">Chỉnh sửa</a>
                                <a href="{{ route('admin.user.list') }}" class="btn btn-default waves-effect waves-light">Quay lại danh sách</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection