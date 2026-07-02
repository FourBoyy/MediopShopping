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
                            <h4>Users List</h4>
                            <div class="add-product">
                                <a href="{{ route('admin.users.add') }}">Add User</a>
                            </div>
                            <table>
                                <tr>
                                    <th>Image</th>
                                    <th>User Name</th>
                                    <th>Status</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Join Date</th>
                                    <th>Last Login</th>
                                    <th>Setting</th>
                                </tr>
                                <tr>
                                    <td><img src="img/new-product/5-small.jpg" alt="" /></td>
                                    <td>John Doe</td>
                                    <td>
                                        <button class="pd-setting">Active</button>
                                    </td>
                                    <td>john.doe@example.com</td>
                                    <td>Admin</td>
                                    <td>2023-01-01</td>
                                    <td>2023-10-01</td>
                                    <td>Out Of Stock</td>
                                    <td>$15</td>
                                    <td>
                                        <button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="img/new-product/6-small.jpg" alt="" /></td>
                                    <td>Jane Smith</td>
                                    <td>
                                        <button class="ps-setting">Paused</button>
                                    </td>
                                    <td>jane.smith@example.com</td>
                                    <td>User</td>
                                    <td>2023-02-01</td>
                                    <td>2023-10-01</td>
                                    <td>
                                        <button data-toggle="tooltip" title="View" class="pd-setting-ed"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                            </table>
                            <div class="custom-pagination">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">Previous</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection