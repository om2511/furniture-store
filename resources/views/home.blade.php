@extends('layouts.app')

@section('title', 'Home - Furniture Store')

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 text-primary mb-4">Transform Your Home</h1>
                <p class="lead mb-4">Discover premium furniture that combines style, comfort, and quality craftsmanship.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Shop Now</a>
            </div>
            <div class="col-lg-6">
                <img src="https://images.pexels.com/photos/116910/pexels-photo-116910.jpeg?auto=compress&cs=tinysrgb&w=600&h=400&fit=crop" 
                     class="img-fluid rounded" alt="Premium Furniture">
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Shop by Category</h2>
        <div class="row">
            @php
                $categoryImages = [
                    'Chairs' => 'https://images.pexels.com/photos/116910/pexels-photo-116910.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop',
                    'Tables' => 'https://images.pexels.com/photos/245208/pexels-photo-245208.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop',
                    'Sofas' => 'https://images.pexels.com/photos/1350789/pexels-photo-1350789.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop',
                    'Storage' => 'https://images.pexels.com/photos/1148955/pexels-photo-1148955.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop',
                    'Beds' => 'https://images.pexels.com/photos/116910/pexels-photo-116910.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop',
                    'Cabinets' => 'https://images.pexels.com/photos/245208/pexels-photo-245208.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop'
                ];
            @endphp
            
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card border-0 shadow">
                    <img src="{{ $categoryImages[$category->name] ?? 'https://images.pexels.com/photos/1350789/pexels-photo-1350789.jpeg?auto=compress&cs=tinysrgb&w=300&h=200&fit=crop' }}" 
                         class="card-img-top" alt="{{ $category->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        <a href="{{ route('products.index', ['category' => $category->id]) }}" 
                           class="btn btn-outline-primary">View Products</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Featured Products</h2>
        <div class="row">
            @foreach($featuredProducts as $product)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow">
                    <img src="{{ $product->image }}" 
                         class="card-img-top product-image" alt="{{ $product->name }}"
                         onerror="this.src='https://images.pexels.com/photos/1148955/pexels-photo-1148955.jpeg?auto=compress&cs=tinysrgb&w=250&h=200&fit=crop'">
                    <div class="card-body">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <p class="text-muted small">{{ Str::limit($product->description, 50) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h6 text-primary">₹{{ number_format($product->price) }}</span>
                                @if($product->compare_price)
                                <span class="text-muted text-decoration-line-through small">
                                    ₹{{ number_format($product->compare_price) }}
                                </span>
                                @endif
                            </div>
                            <a href="{{ route('products.show', $product->slug) }}" 
                               class="btn btn-sm btn-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection