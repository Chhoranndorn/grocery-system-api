<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
        ]);

        Brand::create([
            'name' => $request->name,
        ]);

        return redirect('/brands')->with('success', 'Brand created');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $id,
        ]);

        $brand = Brand::findOrFail($id);

        $brand->update([
            'name' => $request->name,
        ]);

        return redirect('/brands')->with('success', 'Brand updated');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        // Optional safety: prevent delete if used
        // if ($brand->products()->count() > 0) {
        //     return back()->with('error', 'Brand is in use');
        // }

        $brand->delete();

        return redirect('/brands')->with('success', 'Brand deleted');
    }
}
