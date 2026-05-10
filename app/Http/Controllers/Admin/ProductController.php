<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::with('category','brand')->latest()->paginate(10);

    return view('admin.products.index', compact('products'));
}

public function create()
{
    $categories = Category::all();
    $brands = Brand::all();

    return view('admin.products.create', compact('categories','brands'));
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'required|exists:brands,id',
    ]);

    \App\Models\Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'brand_id' => $request->brand_id,
    ]);

   return redirect('/products')
    ->with('success', 'Product created successfully');
}
public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    $brands = Brand::all();

    return view('admin.products.edit', compact('product','categories','brands'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'required|exists:brands,id',
    ]);

    $product = Product::findOrFail($id);

    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'brand_id' => $request->brand_id,
    ]);

    return redirect('/products')->with('success', 'Product updated successfully');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect('/products')->with('success', 'Product deleted successfully');
}
}
