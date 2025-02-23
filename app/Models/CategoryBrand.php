<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryBrand extends Model
{
    protected $table = 'categories_brands';
    protected $fillable = ['category_id', 'brand_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }
}
