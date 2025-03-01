<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['brand'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function flavours()
    {
        return $this->belongsToMany(Flavour::class, 'brands_flavours');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_brands');
    }

}
