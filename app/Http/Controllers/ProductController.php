<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('dashboard.product.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.product.product-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|min:3|unique:products',
            'description' => 'required|min:12',
            'category_id' => 'required',
            'price' => 'required|min:3|integer',
            'image' => 'required|file|max:10920|mimes:jpg,jpeg,png,webp,avif'
        ]);

        if($request->file('image')){
            $validation['image'] = $request->file('image')->store('products');
        }
        
        $validation['user_id'] = Auth::user()->id;
        Product::create($validation);
        return redirect()->route('dashboard-products')->with('success', 'Product berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('dashboard.product.product-edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'description' => 'required|min:12',
            'category_id' => 'required',
            'price' => 'required|min:3|integer',
            // 'image' => 'required|file|max:10920|mimes:jpg,jpeg,png,webp,avif'
        ];
        
        if($request->name != $product->name) {
            $rules['name'] = 'required|min:3|unique:products';
        }
        $validation = $request->validate($rules);
        
        if($request->file('image')){
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validation['image'] = $request->file('image')->store('products');
        }
        
        $validation['user_id'] = Auth::user()->id;
        $product->update($validation);
        return redirect()->route('dashboard-products')->with('success', 'Product berhasil di tambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->image) {
            Storage::delete($product->image);
        }
        Product::destroy($product->id);
        return redirect()->route('dashboard-products')->with('success', 'Product berhasil di tambahkan');
    }
}