@extends('layouts.app')

@section('title', 'Products - Furniture Store')

@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Filters</h5>
                </div>
                <div class="card-body">
                    <form method="GET">
                        <!-- Search -->
                        <div class="mb-3">
                            <label class="form-label">Search</label>
                            <input type="text" name="search" class="form-control" 
                                   value="{{ request('search') }}" placeholder="Search products...">
                        </div>
                        
                        <!-- Categories -->
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-sm">Apply Filters</button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">Clear</a>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Products Grid -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Products</h2>
                <span class="text-muted">{{ $products->total() }} products found</span>
            </div>
            
            <div class="row">
                @php
                    $sampleImages = [
                        'https://images.pexels.com/photos/116910/pexels-photo-116910.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop',
                        'https://images.pexels.com/photos/245208/pexels-photo-245208.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop',
                        'https://images.pexels.com/photos/1350789/pexels-photo-1350789.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop',
                        'https://images.pexels.com/photos/1148955/pexels-photo-1148955.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop'
                    ];
                @endphp
                
                @forelse($products as $index => $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm product-card h-100">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ $sampleImages[$index % 4] }}" 
                                 class="card-img-top product-image" alt="{{ $product->name }}"
                                 loading="lazy">
                            @if($product->compare_price)
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-danger">
                                    {{ round((($product->compare_price - $product->price) / $product->compare_price) * 100) }}% OFF
                                </span>
                            </div>
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title fw-bold">{{ $product->name }}</h6>
                            <p class="text-muted small flex-grow-1">{{ Str::limit($product->description, 80) }}</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="h6 text-primary fw-bold">₹{{ number_format($product->price) }}</span>
                                    @if($product->compare_price)
                                    <br>
                                    <span class="text-muted text-decoration-line-through small">
                                        ₹{{ number_format($product->compare_price) }}
                                    </span>
                                    @endif
                                </div>
                                <span class="badge bg-light text-dark border">{{ $product->category->name }}</span>
                            </div>
                            <div class="mt-auto">
                                <a href="{{ route('products.show', $product->slug) }}" 
                                   class="btn btn-primary btn-sm w-100">
                                    <i class="fas fa-eye me-1"></i>View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <h4>No products found</h4>
                        <p class="text-muted">Try adjusting your filters</p>
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                <nav aria-label="Products pagination">
                    {{ $products->withQueryString()->links('pagination::bootstrap-4', ['class' => 'pagination-custom']) }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection