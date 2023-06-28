<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('index', compact('products', 'categories'));
    }

    public function product($category, $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('   product', compact('product', 'categories'));
    }

    public function shop($code)
    {
        $categories = Category::all();
        $productsQuery = Product::query();

        if ($code) {
            $category = Category::where('code', $code)->first();
            if ($category) {
                $productsQuery->where('category_id', $category->id);
            }
        }

        $products = $productsQuery->paginate(12); // Здесь указывается количество отображаемых записей на одной странице

        $categoryName = $category->name;
        return view('shop', compact('categories', 'category', 'products', 'categoryName'));
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function aboutus()
    {
        return view('aboutus');
    }



}
