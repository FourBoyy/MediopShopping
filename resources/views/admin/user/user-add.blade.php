@extends('admin.master')
@section('title', 'Add User')
@section('head','Add New User')
@section('description','Thêm người dùng mới vào hệ thống quản trị Mediopshopping.')
@section('body')
<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    {{-- Đổi màu tiêu đề thành trắng --}}
                    <h4 style="color: white;">Thêm người dùng mới</h4>
                    
                    {{-- Hiển thị thông báo lỗi Validate nếu có --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="admin/user/create" method="POST" enctype="multipart/form-data">
                        @csrf 
                        
                        <div class="form-group">
                            <label for="username" style="color: white;">Tên đăng nhập (Username) <span class="text-danger">*</span></label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập..." value="{{ old('username') }}" required maxlength="40">
                        </div>

                        <div class="form-group">
                            <label for="email" style="color: white;">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Nhập địa chỉ email..." value="{{ old('email') }}" required maxlength="60">
                        </div>

                        <div class="form-group">
                            <label for="password" style="color: white;">Mật khẩu <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu..." required maxlength="80">
                        </div>

                        <div class="form-group">
                            <label for="phonenumber" style="color: white;">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="Nhập số điện thoại..." value="{{ old('phonenumber') }}" required maxlength="10">
                        </div>

                        <div class="form-group">
                            <label for="roleId" style="color: white;">Vai trò (Role) <span class="text-danger">*</span></label>
                            <select name="roleId" id="roleId" class="form-control" required>
                                <option value="">--- Chọn vai trò ---</option>
                                @if(isset($roles))
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('roleId') == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="avatar" style="color: white;">Ảnh đại diện (Avatar)</label>
                            <input type="file" name="avatar" id="avatar" class="form-control" accept="image/*">
                            {{-- Đổi màu xám sáng cho dễ nhìn trên nền tối --}}
                            <small style="color: #ccc;">Không bắt buộc.</small>
                        </div>

                        <div class="form-group" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu thông tin</button>
                            <a href="{{ route('admin.user.list') ?? '#' }}" class="btn btn-warning waves-effect waves-light">Hủy bỏ</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection