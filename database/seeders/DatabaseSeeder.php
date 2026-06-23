<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Wireless Headphones', 'price' => 89.99, 'description' => 'Premium noise-cancelling headphones with 30hr battery'],
            ['name' => 'Smart Watch', 'price' => 199.99, 'description' => 'Fitness tracking and notifications'],
            ['name' => 'Laptop Stand', 'price' => 34.99, 'description' => 'Ergonomic aluminum stand'],
            ['name' => 'USB-C Hub', 'price' => 49.99, 'description' => '7-in-1 multiport adapter'],
            ['name' => 'Mechanical Keyboard', 'price' => 129.99, 'description' => 'RGB backlit gaming keyboard'],
            ['name' => '4K Webcam', 'price' => 79.99, 'description' => 'Ultra HD streaming camera'],
            ['name' => 'Portable SSD 1TB', 'price' => 109.99, 'description' => 'High-speed external storage'],
            ['name' => 'Wireless Mouse', 'price' => 29.99, 'description' => 'Ergonomic design with long battery'],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => $product['description'],
                'price' => $product['price'],
                'stock' => rand(10, 100),
                'is_active' => true,
            ]);
        }
    }
}
