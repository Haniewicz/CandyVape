<?php

namespace App\Services;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryBrand;


class BrandService
{
    public function insert($request){
        $request->validate([
            'category' => 'required',
            'brand' => 'required'
        ]);

        if(Brand::where('brand', $request->brand)->exists())
        {
            $brand_id = Brand::where('brand', $request->brand)->first()->id;
            foreach($request->category as $category)
            {
                if(!CategoryBrand::where('category_id', $category)->where('brand_id', $brand_id)->exists())
                {
                    CategoryBrand::create([
                        'category_id' => $category,
                        'brand_id' => $brand_id,
                    ]);
                }
            }
            return ['success' => 'Dodano markę'];
            
        }else{
            $brand_id = Brand::Create([
                'brand' => $request->brand
            ])->id;
            foreach($request->category as $category)
            {
                CategoryBrand::create([
                    'category_id' => $category,
                    'brand_id' => $brand_id,
                ]);
            }
            return ['success' => 'Dodano markę'];
            
        }

        
    }
}
