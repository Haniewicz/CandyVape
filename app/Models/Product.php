<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['category_id', 'brand_id', 'flavour_id', 'power', 'quantity', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return Category::all();
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function flavour()
    {
        return $this->belongsTo(Flavour::class);
    }
}
