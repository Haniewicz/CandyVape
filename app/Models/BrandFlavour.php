<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandFlavour extends Model
{
    protected $table = 'brands_flavours';
    protected $fillable = ['brand_id', 'flavour_id'];

    public function flavours()
    {
        return $this->belongsTo(Flavour::class);
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }
}
