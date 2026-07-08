@extends('admin.master')
@section('title', 'Product Detail')
@section('head', 'Product Detail')
@section('description', 'View product details in the Mediopshopping admin panel.')
@section('body')
<div class="single-product-tab-area mg-t-0 mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-product-pr">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <div class="product-tab-list tab-pane fade active in" id="single-tab1">
                                @php($firstImage = $product->images->first())
                                <img src="{{ $firstImage ? $firstImage->imgLink : 'img/product/bg-1.jpg' }}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <div class="single-product-details res-pro-tb">
                                <h1>{{ $product->name }}</h1>

                                <div class="single-pro-price">
                                    <span class="single-regular">{{ $product->price }}</span>
                                </div>

                                <div class="single-pro-size">
                                    <h6>Category</h6>
                                    <span>{{ optional($product->category)->name }}</span>
                                </div>

                                <div class="single-pro-size">
                                    <h6>Stock</h6>
                                    <span>{{ $product->stock }}</span>
                                </div>

                                <div class="single-pro-button" style="margin-top: 20px;">
                                    <div class="pro-button">
                                        <a class="btn btn-primary" href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

