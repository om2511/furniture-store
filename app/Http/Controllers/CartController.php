<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)
                        ->with('product')
                        ->get();
        
        return view('cart.index', compact('cartItems'));
    }
    
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        
        $existingCart = Cart::where('user_id', Auth::user()->id)
                           ->where('product_id', $request->product_id)
                           ->first();
        
        if ($existingCart) {
            $existingCart->quantity += $request->quantity;
            $existingCart->save();
        } else {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }
        
        return redirect()->back()->with('success', 'Product added to cart!');
    }
    
    public function update(Request $request, $id)
    {
        $cartItem = Cart::where('user_id', Auth::user()->id)->findOrFail($id);
        $cartItem->update(['quantity' => $request->quantity]);
        
        return redirect()->back()->with('success', 'Cart updated!');
    }
    
    public function remove($id)
    {
        Cart::where('user_id', Auth::user()->id)->findOrFail($id)->delete();
        
        return redirect()->back()->with('success', 'Item removed from cart!');
    }
}