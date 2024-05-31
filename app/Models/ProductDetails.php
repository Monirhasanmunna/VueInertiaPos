<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;

    protected $fillabe = [
        'id', 
        'product_id', 
        'unique_code', 
        'description', 
        'purchase_price', 
        'saling_price', 
        'quantity', 
        'color'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
