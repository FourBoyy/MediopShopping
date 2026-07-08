<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function productList()
    {
        $products = Product::with(['category', 'images'])
            ->orderByDesc('id')
            ->get();

        return view('admin.product.product-list', compact('products'));
    }

    public function productAdd()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.product.product-add', compact('categories'));
    }

    private function uploadProductImages(Request $request, $productId): void
    {
        if (!$request->hasFile('photos')) {
            return;
        }

        $files = $request->file('photos');
        if (!is_array($files)) {
            $files = [$files];
        }

        $service = app(\App\Services\CloudinaryProductImageService::class);

        foreach ($files as $file) {
            if (!$file || !$file->isValid()) {
                continue;
            }

            $imgUrl = $service->upload(
                $file,
                \App\Helpers\ProductImages::toCloudinaryFolder(),
                ['product']
            );

            Image::create([
                'imgLink' => $imgUrl,
                'productId' => $productId,
            ]);
        }
    }

    public function productCreate(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'stock' => ['required'],
            'categoryId' => ['required', 'exists:categories,id'],
            'photos.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
        ]);

        $validated['price'] = (string) $validated['price'];
        $validated['stock'] = (string) $validated['stock'];

        $product = Product::create($validated);
        $this->uploadProductImages($request, $product->id);

        return Redirect::route('admin.products.list')->with('success', 'Product created successfully.');
    }

    public function productEdit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('admin.product.product-edit', compact('product', 'categories'));
    }

    public function productUpdate(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'stock' => ['required'],
            'categoryId' => ['required', 'exists:categories,id'],
            'photos.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
        ]);

        $validated['price'] = (string) $validated['price'];
        $validated['stock'] = (string) $validated['stock'];

        $product->update($validated);
        $this->uploadProductImages($request, $product->id);

        return Redirect::route('admin.products.detail', $product->id)->with('success', 'Product updated successfully.');
    }

    public function productDelete($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $product->images()->delete();
        $product->delete();

        return Redirect::route('admin.products.list')->with('success', 'Product deleted successfully.');
    }

    public function productDetail($id)
    {
        $product = Product::with('category')->findOrFail($id);

        return view('admin.product.product-detail', compact('product'));
    }
}

