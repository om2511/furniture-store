@extends('layouts.app')

@section('title', $product->name . ' - Furniture Store')

@section('content')
<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>
    
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ $product->image }}" 
                 class="img-fluid rounded" alt="{{ $product->name }}"
                 onerror="this.src='https://images.pexels.com/photos/245208/pexels-photo-245208.jpeg?auto=compress&cs=tinysrgb&w=500&h=400&fit=crop'">
        </div>
        
        <div class="col-lg-6">
            <h1>{{ $product->name }}</h1>
            <p class="text-muted">Category: {{ $product->category->name }}</p>
            
            <div class="my-3">
                <span class="h4 text-primary">₹{{ number_format($product->price) }}</span>
                @if($product->compare_price)
                <span class="text-muted text-decoration-line-through h6 ms-2">
                    ₹{{ number_format($product->compare_price) }}
                </span>
                <span class="badge bg-success ms-2">
                    Save ₹{{ number_format($product->compare_price - $product->price) }}
                </span>
                @endif
            </div>
            
            <p class="lead">{{ $product->description }}</p>
            
            <div class="mb-3">
                <span class="text-muted">Stock: </span>
                @if($product->stock > 0)
                    <span class="text-success">{{ $product->stock }} available</span>
                @else
                    <span class="text-danger">Out of stock</span>
                @endif
            </div>
            
            @auth
                @if($product->stock > 0)
                <form action="{{ route('cart.add') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="row">
                        <div class="col-4">
                            <input type="number" name="quantity" class="form-control" 
                                   value="1" min="1" max="{{ $product->stock }}">
                        </div>
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </form>
                @endif
            @else
            <div class="alert alert-info">
                <a href="{{ route('login') }}">Login</a> to add items to cart
            </div>
            @endauth
        </div>
    </div>
    
    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <section class="mt-5">
        <h3>Related Products</h3>
        <div class="row">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card border-0 shadow">
                    <img src="{{ $relatedProduct->image }}" 
                         class="card-img-top product-image" alt="{{ $relatedProduct->name }}"
                         onerror="this.src='https://images.pexels.com/photos/1350789/pexels-photo-1350789.jpeg?auto=compress&cs=tinysrgb&w=250&h=200&fit=crop'">
                    <div class="card-body">
                        <h6 class="card-title">{{ $relatedProduct->name }}</h6>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-primary">₹{{ number_format($relatedProduct->price) }}</span>
                            <a href="{{ route('products.show', $relatedProduct->slug) }}" 
                               class="btn btn-sm btn-outline-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
</div>
@endsection