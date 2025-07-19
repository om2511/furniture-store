<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('status', true);
        
        if ($request->category) {
            $query->where('category_id', $request->category);
        }
        
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        $products = $query->paginate(12);
        $categories = Category::all();
        
        return view('products.index', compact('products', 'categories'));
    }
    
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $product->id)
                                ->take(4)->get();
        
        return view('products.show', compact('product', 'relatedProducts'));
    }
}