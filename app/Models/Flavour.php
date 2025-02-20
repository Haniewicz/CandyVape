<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flavour extends Model
{
    protected $table = 'flavours';
    protected $fillable = ['flavour'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    Public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }
}
