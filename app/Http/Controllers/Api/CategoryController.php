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
            // 'data' => Category::all()
            'data' => Category::all()->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'image' => asset('storage/' . $category->image),
                    'created_at' => $category->created_at,
                    'updated_at' => $category->updated_at,
                ];
            })
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('categories', 'public');

        $category = Category::create([
            'name' => $data['name'],
            'image' => $imagePath,
        ]);

        return response()->json([
            'status' => true,
            'data' => [
                'id' => $category->id,
                'name' => $category->name,
                'image' => asset('storage/' . $category->image),
            ]
        ], 201);
    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // update name
        $category->name = $data['name'];

        // update image only if sent
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->image = $imagePath;
        }

        $category->save();

        return response()->json([
            'status' => true,
            'data' => [
                'id' => $category->id,
                'name' => $category->name,
                'image' => asset('storage/' . $category->image),
            ]
        ]);
    }
}
