<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name'
        ]);

        $category = Category::create($data);

        return response()->json([
            'status' => true,
            'data' => $category
        ], 201);
    }
}
