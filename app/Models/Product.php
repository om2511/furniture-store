<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'slug', 'description', 'price', 'compare_price', 
        'image', 'gallery', 'stock', 'category_id', 'status'
    ];
    
    protected $casts = [
        'gallery' => 'array',
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
}