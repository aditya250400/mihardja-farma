<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $products = Product::with('category')->latest()->take(6)->get();
        $categories = Category::all();

        return view('front.index', compact('products', 'categories'));
    }
}
