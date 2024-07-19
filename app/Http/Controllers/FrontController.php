<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index() {
        $carts = 0;
       if(Auth::check()) {
        $carts = Auth::user()->carts()->count();
       }
        $products = Product::with('category')->latest()->take(4)->get();
        $categories = Category::latest()->take(4)->get();
        $mostPurchased = Product::withCount('transactionDetails')->orderBy('transaction_details_count', 'DESC')->take(3)->get();

        return view('front.index', compact('products', 'categories', 'mostPurchased', 'carts'));
    }

    public function details(Product $product) {
        return view('front.details', compact('product'));
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'LIKE', '%'. $keyword. '%')->get();

        return view('front.search', compact('products', 'keyword'));

    }

    public function category(Category $category) {
        $products = Product::where('category_id', $category->id)->with('category')->get();
        return view('front.category', compact('products', 'category'));
    }
}
