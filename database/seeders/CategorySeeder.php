<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Chairs', 
                'slug' => 'chairs', 
                'description' => 'Comfortable chairs for every space'
            ],
            [
                'name' => 'Tables', 
                'slug' => 'tables', 
                'description' => 'Dining and coffee tables'
            ],
            [
                'name' => 'Sofas', 
                'slug' => 'sofas', 
                'description' => 'Luxury sofas and seating'
            ],
            [
                'name' => 'Storage', 
                'slug' => 'storage', 
                'description' => 'Wardrobes and storage solutions'
            ],
            [
                'name' => 'Beds', 
                'slug' => 'beds', 
                'description' => 'Comfortable beds and mattresses'
            ],
            [
                'name' => 'Cabinets', 
                'slug' => 'cabinets', 
                'description' => 'Kitchen and office cabinets'
            ]
        ];
        
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}