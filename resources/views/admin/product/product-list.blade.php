@extends('admin.master')
@section('title', 'Products List')
@section('head','Products List')
@section('description','Add, edit,delete, and manage products in the Mediopshopping admin panel. View product details, stock status, and sales information.')
@section('body')
<div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Products List</h4>
                            <div class="add-product">
                                <a href="{{ route('admin.products.add') }}">Add Product</a>
                            </div>
                            <table>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Title</th>
                                    <th>Status</th>
                                    <th>Purchases</th>
                                    <th>Product sales</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Setting</th>
                                </tr>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        @php($firstImage = $product->images->first())
                                        <img src="{{ $firstImage ? $firstImage->imgLink : 'img/new-product/5-small.jpg' }}" alt="" />
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        @if ((int) $product->stock <= 0)
                                            <button class="ds-setting">Disabled</button>
                                        @elseif ((int) $product->stock <= 25)
                                            <button class="ps-setting">Paused</button>
                                        @else
                                            <button class="pd-setting">Active</button>
                                        @endif
                                    </td>
                                    <td>0</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        @if ((int) $product->stock <= 0)
                                            Out Of Stock
                                        @elseif ((int) $product->stock <= 25)
                                            Low Stock
                                        @else
                                            In Stock
                                        @endif
                                    </td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a data-toggle="tooltip" title="View" class="pd-setting-ed" href="{{ route('admin.products.detail', $product->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a data-toggle="tooltip" title="Edit" class="pd-setting-ed" href="{{ route('admin.products.edit', $product->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <form method="POST" action="{{ route('admin.products.delete', $product->id) }}" style="display:inline-block" onsubmit="return confirm('Are you sure delete this product?')">
                                            @csrf
                                            @method('DELETE')
                                            <button data-toggle="tooltip" title="Trash" class="pd-setting-ed" type="submit">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
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