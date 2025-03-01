<?php

namespace App\Services;
use App\Models\flavour;
use App\Models\brand;
use App\Models\BrandFlavour;
/**
 * Class FlavourController.
 */
class FlavourService
{
    public function insert($request){
        $request->validate([
            'brand' => 'required',
            'flavour' => 'required'
        ]);

        if(flavour::where('flavour', $request->flavour)->exists())
        {
            $flavour_id = Flavour::where('flavour', $request->flavour)->first()->id;
            foreach($request->brand as $brand)
            {
                if(!BrandFlavour::where('brand_id', $brand)->where('flavour_id', $flavour_id)->exists())
                {
                    BrandFlavour::create([  
                        'brand_id' => $brand,
                        'flavour_id' => $flavour_id,
                    ]);
                }
            }
            return ['success' => 'Dodano smak'];
        }else{
            $flavour_id = Flavour::Create([
                'flavour' => $request->flavour
            ])->id;
            foreach($request->brand as $brand)
            {
                BrandFlavour::create([
                    'brand_id' => $brand,
                    'flavour_id' => $flavour_id,
                ]);
            }
            return ['success' => 'Dodano smak'];
        }

        
    }
}


