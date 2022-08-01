<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends BackendBaseModel
{
    use HasFactory;
    protected $table = 'product_images';
    protected $fillable = [
        'product_id',
        'name',
        'image',
        'status',
        'created_by',
        'updated_by'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

}


