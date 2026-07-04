@extends('admin.master')
@section('title', 'Edit User')
@section('head','Chỉnh sửa thông tin người dùng')
@section('description','Cập nhật thông tin người dùng trong hệ thống.')

@section('body')
<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4 style="color: white;">Chỉnh sửa người dùng: {{ $user->username }}</h4>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    {{-- Hiển thị lỗi validate --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                    </div>
                    @endif

                    {{-- Form cập nhật --}}
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- Bắt buộc để nhận diện phương thức update --}}

                        <div class="form-group">
                            <label style="color: white;">Tên đăng nhập</label>
                            <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                        </div>

                        <div class="form-group">
                            <label style="color: white;">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label style="color: white;">Số điện thoại</label>
                            <input type="text" name="phonenumber" class="form-control" value="{{ old('phonenumber', $user->phonenumber) }}" required>
                        </div>

                        <div class="form-group">
                            <label style="color: white;">Vai trò</label>
                            <select name="roleId" class="form-control" required>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ (old('roleId', $user->roleId) == $role->id) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label style="color: white;">Ảnh đại diện hiện tại</label>
                            <div>
                                <img src="{{ asset('storage/'.$user->avatar) }}" width="100" alt="Avatar">
                            </div>
                            <input type="file" name="avatar" class="form-control" style="margin-top:10px;">
                        </div>

                        <div class="form-group" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('admin.user.list') }}" class="btn btn-warning">Hủy bỏ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
