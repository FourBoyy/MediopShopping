<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        return view('admin.product.product-list');
    }
    public function productAdd()
    {
        return view('admin.product.product-add');
    }
    public function productEdit(){
        return view('admin.product.product-edit');
    }
    public function productDetail()
    {
        return view('admin.product.product-detail');
    }
}
