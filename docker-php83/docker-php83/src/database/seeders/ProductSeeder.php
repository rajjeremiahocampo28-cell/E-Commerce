<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                "name" => "Santos de Cartier",
                "price" => 9500,
                "description" => "A timeless luxury timepiece with classic engineering.",
                "image" => "item1.jpg"
            ],
            [
                "name" => "Rolex Daytona",
                "price" => 12000,
                "description" => "One of the most iconic Rolex designs with unbeatable precision.",
                "image" => "item2.jpg"
            ],
            [
                "name" => "Patek Philippe Nautilus",
                "price" => 25000,
                "description" => "A highly sought-after luxury sports watch with a timeless silhouette.",
                "image" => "item3.jpg"
            ],
            [
                "name" => "Audemars Piguet Royal Oak",
                "price" => 6000,
                "description" => "The legendary Royal Oak with a bold and distinctive design.",
                "image" => "item4.jpg"
            ]
        ]);
    }
}
