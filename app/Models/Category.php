<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BackendBaseModel
{
    use HasFactory;
    protected $fillable = ['name','slug','image','rank','short_description','long_description','status','created_by','updated_by'];

    public function subCategories(){
        return $this->hasMany(Subcategory::class);
    }
}
