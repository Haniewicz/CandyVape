<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'categories_brands');
    }
}
