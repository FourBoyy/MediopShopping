@extends('admin.master')
@section('title', 'Users List')
@section('head','Users List')
@section('description','Add, edit,delete, and manage users in the Mediopshopping admin panel. View user details, status, and activity information.')
@section('body')
<div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Danh sách người dùng</h4>
                            <div class="add-product">
                                <a href="{{ route('admin.users.add') }}">Add User</a>
                            </div>
                            <table>
                                <tr>
                                    <th>ẢnH đại diện</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Email</th>
                                    <th>Vai trò</th>
                                    <th>Ngày tham gia</th>
                                    <th>Ngày cập nhật thông tin</th>
                                    <th>Setting</th>
                                </tr>
                                @foreach($users as $user)
                                      <tr>
                                    <td><img src="{{$user->avatar}}" alt="" /></td>
                                    <td>{{$user->username}}</td>
                                
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>

                                    <td colspan="2">
                                        <button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                              
                             
                            </table>
                           {{ $users->links('components.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection