<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['Hyundai', 'Apple', 'Samsung', 'AMP', 'HAVELLS'];

        foreach ($brands as $key => $brand) {
            Brand::updateOrCreate([
                'name' => $brand,
                'slug' => Str::slug($brand)
            ]);
        }
    }
}
