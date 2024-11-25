<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{

    Public function home()
    {
        // $categories = Category::with('products')->get();
        $categoryIds = [1, 2]; // Ganti dengan ID kategori yang ingin ditampilkan
        $categories = Category::with('products')
            ->whereIn('id', $categoryIds)
            ->get();
        $categoryVavbar = Category::all();
        return view('home', compact('categories', 'categoryVavbar'));
    }
    

    Public function category(Category $category)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $category->id)->get();
        return view('products-category', [
            'products' => $products,
            'category' => $category,
            'categories' => $categories
        ]);
    }

    Public function product(Product $product)
    {
        $categoryVavbar = Category::all();
        return view('product', compact('categoryVavbar', 'product'));
    }

}