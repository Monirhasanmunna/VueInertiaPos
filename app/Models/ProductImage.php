<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'image'];

    protected $appends = ['src'];

    public function getSrcAttribute()
    {
        return asset('storage/'.$this->image);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
