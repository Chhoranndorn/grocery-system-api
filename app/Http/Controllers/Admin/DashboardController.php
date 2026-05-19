<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $brandCount = Brand::count();

        return view('dashboard', compact(
            'productCount',
            'categoryCount',
            'brandCount'
        ));
    }
}
