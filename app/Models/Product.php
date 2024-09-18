<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded;

    public function getCategories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getSubcategories(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}
