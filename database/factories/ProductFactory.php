<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $product_name = $this->faker->unique()->words($nb=2,$asText = true);
        $slug = Str::slug($product_name);
        $image_name =$this->faker->numberBetween(1,24).'.jpg';
         // Determine whether to include sale_price or make it null
         $includeSalePrice = $this->faker->boolean(30); // Adjust probability as needed
        return [
            'name' => Str::title($product_name),
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(1,22),
            'sale_price' => $includeSalePrice ? $this->faker->numberBetween(1, 22) : null,
            'SKU' => 'SMD'.$this->faker->numberBetween(100,500),
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(100,200),
            'image' => $image_name,
            'images' => $image_name,
            'category_id' => $this->faker->numberBetween(1,6),
            'brand_id' => $this->faker->numberBetween(1,6)
        ];
    }
}
