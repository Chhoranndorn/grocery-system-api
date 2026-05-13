<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
public function index(Request $request)
{
    $query = Product::with('category', 'brand');

    // search
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // filter category
    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    // filter brand
    if ($request->filled('brand_id')) {
        $query->where('brand_id', $request->brand_id);
    }

    $products = $query->latest()->paginate(10)->withQueryString();

    // ✅ REQUIRED for dropdowns
    $categories = Category::all();
    $brands = Brand::all();

    return view('admin.products.index', compact('products', 'categories', 'brands'));
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
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);
if ($request->hasFile('image')) {
    $path = $request->file('image')->store('products', 'public');
} else {
    $path = null;
}
    \App\Models\Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'brand_id' => $request->brand_id,
        'image' => $path,
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
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $product = Product::findOrFail($id);

    if ($request->hasFile('image')) {

    // delete old image
    if ($product->image && Storage::disk('public')->exists($product->image)) {
        Storage::disk('public')->delete($product->image);
    }

    $path = $request->file('image')->store('products', 'public');
} else {
    $path = $product->image;
}

    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'brand_id' => $request->brand_id,
        'image' => $path,
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
