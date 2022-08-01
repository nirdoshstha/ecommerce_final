<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BackendBaseModel
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'code',
        'short_description',
        'long_description',
        'original_price',
        'offer_price',
        'quantity',
        'stock',
        'meta_title',
        'meta_desc',
        'meta_keyword',
        'new_arrival',
        'featured_products',
        'popular_products',
        'offer_products',
        'status',
        'created_by',
        'updated_by',
        'brand_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class);
    }

    public function latestImage(){
        return $this->hasOne(ProductImage::class);
    }
    

    public function brand(){
        return $this->belongsTo(Brand::class);
    }



}


