<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;


class ProductController extends Controller
{
    // PUBLIC
    public function index()
    {
        return Product::with('category')->get();
        // return Product::with('category')->paginate(8);
    }

    public function show(Product $product)
    {
        $this->authorize('view', $product);
        return $product->load('category');
    }

    // ADMIN
    public function store(ProductRequest $request)
    {
        $this->authorize('create', Product::class);
        return Product::create($request->validated());
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);
        $product->update($request->validated());
        return $product;
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return response()->noContent();
    }
}
