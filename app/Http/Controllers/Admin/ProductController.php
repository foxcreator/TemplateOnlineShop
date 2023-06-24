<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $product = Product::create($data);

        if ($product) {
            return redirect()->back()->with('status', "Продукт {$product->name} был успешно добавлен!");
        } else {
            return redirect()->back()->with('warn', 'Oops, something went wrong. Please check the logs.')->withInput();
        }
    }
}
