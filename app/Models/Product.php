<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'unique_code', 
        'name', 
        'description', 
        'category_id', 
        'brand_id', 
        'unit_id', 
        'tax_id', 
        'image', 
        'purchase_price', 
        'saling_price', 
        'status'
    ];

    protected $appends = ['src'];

    public function getSrcAttribute()
    {
        return asset($this->image);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%');
    }
    
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }

    public function details()
    {
        return $this->hasOne(ProductDetails::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
