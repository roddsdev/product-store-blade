<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        Manufacturer::each(function ($manufacturer) use ($categories) {
                $randomCategory = $categories->random(3);
                Product::factory(10)                    
                    ->state(['manufacturer_id' => $manufacturer->id])
                    ->create()
                    ->each(function ($product) use ($randomCategory) {
                        $product->categories()->attach($randomCategory->pluck('id'));
                    });
            });
    }
}
