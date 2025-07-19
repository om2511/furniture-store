<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Clear existing products
        Product::truncate();
        
        // Sample furniture images - using reliable sources
        $furnitureImages = [
            'https://images.pexels.com/photos/116910/pexels-photo-116910.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop',
            'https://images.pexels.com/photos/245208/pexels-photo-245208.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop',
            'https://images.pexels.com/photos/1350789/pexels-photo-1350789.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop',
            'https://images.pexels.com/photos/1148955/pexels-photo-1148955.jpeg?auto=compress&cs=tinysrgb&w=400&h=300&fit=crop'
        ];
        
        $products = [
            // Chairs
            [
                'name' => 'Executive Office Chair',
                'slug' => 'executive-office-chair',
                'description' => 'Premium executive chair with ergonomic design, lumbar support, and premium leather upholstery. Perfect for long working hours.',
                'price' => 12999.00,
                'compare_price' => 15999.00,
                'image' => $furnitureImages[0],
                'stock' => 50,
                'category_id' => 1
            ],
            [
                'name' => 'Dining Chair Set (4 pieces)',
                'slug' => 'dining-chair-set',
                'description' => 'Modern dining chairs with comfortable cushioning and durable wooden frame. Set of 4 chairs.',
                'price' => 8999.00,
                'compare_price' => 11999.00,
                'image' => $furnitureImages[1],
                'stock' => 30,
                'category_id' => 1
            ],
            [
                'name' => 'Recliner Chair',
                'slug' => 'recliner-chair',
                'description' => 'Luxurious recliner chair with footrest and premium fabric upholstery. Perfect for relaxation.',
                'price' => 18999.00,
                'image' => $furnitureImages[2],
                'stock' => 25,
                'category_id' => 1
            ],
            
            // Tables
            [
                'name' => '6-Seater Dining Table',
                'slug' => 'dining-table-6-seater',
                'description' => 'Elegant 6-seater dining table made from premium teak wood with modern design and scratch-resistant finish.',
                'price' => 25999.00,
                'compare_price' => 32999.00,
                'image' => $furnitureImages[3],
                'stock' => 20,
                'category_id' => 2
            ],
            [
                'name' => 'Coffee Table',
                'slug' => 'coffee-table',
                'description' => 'Stylish coffee table with glass top and wooden base. Perfect for living room centerpiece.',
                'price' => 7999.00,
                'image' => $furnitureImages[0],
                'stock' => 40,
                'category_id' => 2
            ],
            [
                'name' => 'Study Table',
                'slug' => 'study-table',
                'description' => 'Compact study table with drawers and cable management. Ideal for home office or student room.',
                'price' => 9999.00,
                'compare_price' => 12999.00,
                'image' => $furnitureImages[1],
                'stock' => 35,
                'category_id' => 2
            ],
            
            // Sofas
            [
                'name' => '3-Seater L-Shape Sofa',
                'slug' => 'l-shape-sofa-3-seater',
                'description' => 'Spacious L-shaped sofa with premium fabric upholstery and comfortable foam cushioning. Perfect for family living room.',
                'price' => 45999.00,
                'compare_price' => 52999.00,
                'image' => $furnitureImages[2],
                'stock' => 15,
                'category_id' => 3
            ],
            [
                'name' => '2-Seater Sofa',
                'slug' => '2-seater-sofa',
                'description' => 'Compact 2-seater sofa with modern design and easy maintenance fabric. Great for small spaces.',
                'price' => 22999.00,
                'image' => $furnitureImages[3],
                'stock' => 25,
                'category_id' => 3
            ],
            [
                'name' => 'Sofa Cum Bed',
                'slug' => 'sofa-cum-bed',
                'description' => 'Versatile sofa that converts to a bed. Perfect for guests and small apartments.',
                'price' => 28999.00,
                'compare_price' => 34999.00,
                'image' => $furnitureImages[0],
                'stock' => 18,
                'category_id' => 3
            ],
            
            // Storage
            [
                'name' => '3-Door Wardrobe',
                'slug' => '3-door-wardrobe',
                'description' => 'Spacious 3-door wardrobe with mirror, hanging space, and multiple shelves. Made from engineered wood.',
                'price' => 19999.00,
                'compare_price' => 24999.00,
                'image' => $furnitureImages[1],
                'stock' => 22,
                'category_id' => 4
            ],
            [
                'name' => 'Bookshelf 5-Tier',
                'slug' => 'bookshelf-5-tier',
                'description' => '5-tier bookshelf with modern design and sturdy construction. Perfect for books and decorative items.',
                'price' => 6999.00,
                'image' => $furnitureImages[2],
                'stock' => 45,
                'category_id' => 4
            ],
            
            // Beds
            [
                'name' => 'King Size Bed with Storage',
                'slug' => 'king-size-bed-storage',
                'description' => 'King size bed with under-bed storage compartments and premium headboard design.',
                'price' => 32999.00,
                'compare_price' => 39999.00,
                'image' => $furnitureImages[3],
                'stock' => 12,
                'category_id' => 5
            ],
            [
                'name' => 'Queen Size Bed',
                'slug' => 'queen-size-bed',
                'description' => 'Elegant queen size bed with upholstered headboard and solid wood construction.',
                'price' => 24999.00,
                'image' => $furnitureImages[0],
                'stock' => 18,
                'category_id' => 5
            ],
            
            // Cabinets
            [
                'name' => 'Kitchen Cabinet Set',
                'slug' => 'kitchen-cabinet-set',
                'description' => 'Complete kitchen cabinet set with soft-close hinges and premium laminate finish.',
                'price' => 55999.00,
                'compare_price' => 65999.00,
                'image' => $furnitureImages[1],
                'stock' => 8,
                'category_id' => 6
            ],
            [
                'name' => 'TV Unit Cabinet',
                'slug' => 'tv-unit-cabinet',
                'description' => 'Modern TV unit with storage compartments and cable management system.',
                'price' => 14999.00,
                'image' => $furnitureImages[2],
                'stock' => 28,
                'category_id' => 6
            ]
        ];
        
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}