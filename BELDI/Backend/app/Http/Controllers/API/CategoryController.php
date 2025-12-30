<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // PUBLIC (navbar menus)
    public function index(Request $request)
    {
        $request->validate([
            'type' => 'required|in:service,product'
        ]);

        return Category::where('type', $request->type)->get();
    }

    // ADMIN
    public function store(Request $request)
    {
        $this->middleware('admin');

        $request->validate([
            'name' => 'required|string|unique:categories',
            'type' => 'required|in:service,product'
        ]);

        return Category::create($request->only('name', 'type'));
    }

    public function update(Request $request, Category $category)
    {
        $this->middleware('admin');

        $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:service,product'
        ]);

        $category->update($request->only('name', 'type'));

        return $category;
    }

    public function destroy(Category $category)
    {
        $this->middleware('admin');

        $category->delete();

        return response()->noContent();
    }
}
