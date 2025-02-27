<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        return view('admin.products.index', compact('products'));
    }

    public function products() {
        $products = Product::with('category')->latest()->get();

        return view('front.products', compact('products'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'code_product' => 'required|max:15',
            'about' => 'required|string',
            'photo' => 'required|image|mimes:png,jpg,jpeg,svg|max:2000',
            'category_id' => 'required|integer',
        ]);


        if($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('product_photos', 'public');
            $validated['photo'] = $photoPath;
        }
        $validated['slug'] = Str::slug($request->name);

        $newProduct = Product::create($validated);

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::latest()->get();
        return view('admin.products.edit', compact('product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:products,name,'.$product->id,
                'price' => 'required|integer',
                'stock' => 'required|integer',
                'code_product' => 'required|max:15',
                'about' => 'required|string',
                'photo' => 'sometimes|image|mimes:png,jpg,jpeg,svg|max:2000',
                'category_id' => 'required|integer',
            ]);

            DB::beginTransaction();

            try {
                if($request->hasFile('photo')) {
                    $photoPath = $request->file('photo')->store('product_photos', 'public');
                    $validated['photo'] = $photoPath;
                }
                $validated['slug'] = Str::slug($request->name);
                $product->update($validated);
                DB::commit();

                return redirect()->route('admin.products.index');
            }catch(\Exception $e) {
                DB::rollBack();
                $error = ValidationException::withMessages([
                    'systemm_error' => ['System error!' => $e->getMessage()],
                ]);

                throw $error;
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->back();

        } catch(\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'systemm_error' => ['System error!' => $e->getMessage()],
            ]);

            throw $error;
        }
    }
}
