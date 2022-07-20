<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends BackendBaseModel
{
    use HasFactory;
    protected $fillable = ['category_id','name','slug','image','rank','short_description','long_description','status','created_by','updated_by'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}


