<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Brand::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name'
        ]);

        $brand = Brand::create($data);

        return response()->json([
            'status' => true,
            'data' => $brand
        ], 201);
    }
}
