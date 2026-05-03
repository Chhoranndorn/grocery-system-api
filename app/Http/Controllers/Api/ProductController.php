<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function index()
    // {
    //     $products = Product::with('category','brand')->get();
    //     // $products = \App\Models\Product::with('category','brand')->get();

    //     return response()->json([
    //         'status'=> true,
    //         // 'data'=> $products
    //         'data' => ProductResource::collection($products),
    //     ]);
    // }

        public function index(Request $request)
    {
        $query = Product::with('category', 'brand');
        //Search by product name
        // if($request->has('search')){
        //     $search = $request->search;
        //     $query->where('name','like',"%{search}%");
        // }
//         if ($request->filled('search')) {
//     $search = trim($request->search);

//     $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%']);
// }
if ($request->filled('search')) {
    $search = trim($request->search);

    $query->where(function ($q) use ($search) {
        $q->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%'])
          ->orWhereHas('category', function ($q2) use ($search) {
              $q2->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%']);
          })
          ->orWhereHas('brand', function ($q3) use ($search) {
              $q3->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%']);
          });
    });
}
            // 🏷 Filter by category
    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

                //Filter by brand
        if($request->filled('brand_id')){
            $query->where('brand_id', $request->brand_id);
        }

        // 🔃 Sorting
$sort = $request->get('sort', 'id');     // default sort by id
$order = $request->get('order', 'asc');  // default asc

// whitelist allowed columns (important for security)
$allowedSorts = ['id', 'name', 'price'];

if (in_array($sort, $allowedSorts) && in_array($order, ['asc', 'desc'])) {
    $query->orderBy($sort, $order);
}
        $perPage = $request->get('per_page', 5);
        $products = $query->paginate($perPage);

        return response()->json([
            'status'=> true,
            'data' => ProductResource::collection($products),
            'meta'=> [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
            ]
        ]);
    }

    public function show($id)
    {
        $product = Product::with('category','brand')->find($id);

        if(!$product){
            return response()->json([
                'status' => false,
                'message'=> 'Product not found'
            ], 404);
        }

        return response()->json([
            'status'=> true,
            // 'data'=> $product
            'data'=> new ProductResource($product),
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'required|exists:brands,id',
    ]);

    $product = Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'brand_id' => $request->brand_id,
    ]);

    return response()->json([
        'status' => true,
        // 'data' => $product
        'data' => new ProductResource($product)
    ], 201);
}

public function update(Request $request, $id)
{
    // $product = Product::find($id);
    $product = Product::findOrFail($id);

    // if (!$product) {
    //     return response()->json([
    //         'status' => false,
    //         'message' => 'Product not found'
    //     ], 404);
    // }

    $request->validate([
        'name' => 'required|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'required|exists:brands,id',
    ]);

    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'brand_id' => $request->brand_id,
    ]);

    return response()->json([
        'status' => true,
        // 'data' => $product
        'data' => new ProductResource($product)
    ]);
}

public function destroy($id)
{
    // $product = Product::find($id);
    $product = Product::findOrFail($id);

    // if (!$product) {
    //     return response()->json([
    //         'status' => false,
    //         'message' => 'Product not found'
    //     ], 404);
    // }

    $product->delete();

    return response()->json([
        'status' => true,
        'message' => 'Product deleted successfully'
    ]);
}

}
