<?php
namespace App\Http\Traits;
use App\Models\Product;
use Illuminate\Support\Str;

trait generateUniqueSKU
{
    public function generateUniqueSKU()
    {
        $sku = mt_rand(10000000, 9999999999); // Generate a random string, you can adjust the length as needed
        
        // Check if SKU already exists
        while (Product::where('unique_code', $sku)->exists()) {
            $sku = mt_rand(10000000, 9999999999); // Regenerate SKU until it's unique
        }
        
        return $sku;
    }
}