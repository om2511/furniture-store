<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::take(6)->get();
        $featuredProducts = Product::where('status', true)->take(8)->get();
        
        return view('home', compact('categories', 'featuredProducts'));
    }
}