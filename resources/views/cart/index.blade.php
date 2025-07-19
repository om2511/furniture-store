@extends('layouts.app')

@section('title', 'Shopping Cart - Furniture Store')

@section('content')
<div class="container py-4">
    <h2>Shopping Cart</h2>
    
    @if($cartItems->count() > 0)
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    @foreach($cartItems as $item)
                    <div class="row align-items-center border-bottom py-3">
                        <div class="col-md-2">
                            <img src="{{ $item->product->image }}" 
                                 class="img-fluid rounded" alt="{{ $item->product->name }}"
                                 onerror="this.src='https://images.pexels.com/photos/1148955/pexels-photo-1148955.jpeg?auto=compress&cs=tinysrgb&w=100&h=80&fit=crop'">
                        </div>
                        <div class="col-md-4">
                            <h6>{{ $item->product->name }}</h6>
                            <p class="text-muted small">{{ $item->product->category->name }}</p>
                        </div>
                        <div class="col-md-2">
                            <span class="text-primary">₹{{ number_format($item->product->price) }}</span>
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                       min="1" max="{{ $item->product->stock }}" 
                                       class="form-control form-control-sm" 
                                       onchange="this.form.submit()">
                            </form>
                        </div>
                        <div class="col-md-1">
                            <span class="fw-bold">₹{{ number_format($item->product->price * $item->quantity) }}</span>
                        </div>
                        <div class="col-md-1">
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                        onclick="return confirm('Remove this item?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Order Summary</h5>
                </div>
                <div class="card-body">
                    @php
                        $subtotal = $cartItems->sum(function($item) {
                            return $item->product->price * $item->quantity;
                        });
                        $shipping = 500; // Fixed shipping
                        $total = $subtotal + $shipping;
                    @endphp
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span>₹{{ number_format($subtotal) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping:</span>
                        <span>₹{{ number_format($shipping) }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between h5">
                        <span>Total:</span>
                        <span class="text-primary">₹{{ number_format($total) }}</span>
                    </div>
                    
                    <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary btn-lg" disabled>
                            Proceed to Checkout (Demo)
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            Continue Shopping
                        </a>
                    </div>
                    
                    <small class="text-muted mt-2 d-block">
                        * Checkout is disabled in this demo version
                    </small>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
        <h4>Your cart is empty</h4>
        <p class="text-muted">Start shopping to add items to your cart</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Shop Now</a>
    </div>
    @endif
</div>
@endsection