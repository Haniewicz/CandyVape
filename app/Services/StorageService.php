<?php

namespace App\Services;

use App\Models\User;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Flavour;
use App\Models\CategoryBrand;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StorageService
{
    public function new_product($request)
    {
        $request->validate([
            'category'=>'required',
            'quantity'=>'required',
        ]);

        $category = $request->category;
        $brand = $request->brand;
        $flavour = $request->flavour;
        $power = $request->power;
        $quantity = $request->quantity;
        $price = $request->price;

        if(Category::where('category', $request->category)->orWhere('id', $request->category)->exists() && $request->category != null)
        {
            $category = Category::where('category', $request->category)->orWhere('id', $request->category)->first()->id;
        }else{
            $category = Category::create([
                'category' => $request->category,
            ])->id;
        }

        if(Brand::where('brand', $request->brand)->orWhere('id', $request->brand)->exists() && $request->brand != null)
        {
            $brand = Brand::where('brand', $request->brand)->orWhere('id', $request->brand)->first()->id;
        }else{
            if($request->brand == null)
            {
                $brand = null;
            }else{
                $brand = Brand::create([
                    'brand' => $request->brand,
                ])->id;
            }
        }

        if(Flavour::where('flavour', $request->flavour)->orWhere('id', $request->flavour)->exists() && $request->flavour != null) 
        {
            $flavour = Flavour::where('flavour', $request->flavour)->orWhere('id', $request->flavour)->first()->id;
        }else{
            if($request->flavour == null)
            {
                $flavour = null;
            }else{
                $flavour = Flavour::create([
                    'flavour' => $request->flavour,
                ])->id;
            }
        }

        if(Product::where('category_id', $category)->where('brand_id', $brand)->where('flavour_id', $flavour)->where('power', $power)->exists())
        {
            $old_quantity = Product::where('category_id', $category)->where('brand_id', $brand)->where('flavour_id', $flavour)->where('power', $power)->get()->first()->quantity;
            if(Product::where('category_id', $category)->where('brand_id', $brand)->where('flavour_id', $flavour)->where('power', $power)->update(['quantity' => $old_quantity + $quantity, 'price' => $price]))
            {
                return ['success'=>'Produkt został zaktualizowany'];
            } else {
                return ['error'=>'Wystąpił bład podczas aktualizacji produktu'];
            }
        }else{
            if(Product::create([
                'category_id' => $category,
                'brand_id' => $brand,
                'flavour_id' => $flavour,
                'power' => $power,
                'quantity' => $quantity,
                'price' => $price,
            ]))
            {
                return ['success'=>'Produkt został dodany'];
            } else {
                return ['error'=>'Wystąpił bład podczas dodawania produktu'];
            }
        }
    }

    public function update_product($request)
    {
        $request->validate([
            'category'=>'required',
            'quantity'=>'required',
        ]);

        $id = $request->id;
        $category = $request->category;
        $brand = $request->brand;
        $flavour = $request->flavour;
        $power = $request->power;
        $quantity = $request->quantity;
        $price = $request->price;

        $old_data = Product::where('id', $id)->first();

        if(Product::where('id', $id)->update([
            'category_id' => $category,
            'brand_id' => $brand,
            'flavour_id' => $flavour,
            'power' => $power,
            'quantity' => $quantity,
            'price' => $price,
        ]))
        {
            return 'Produkt został zaktualizowany';
        } else {
            return 'Wystąpił bład podczas aktualizacji produktu';
        }



    }

    public function delete_product($request)
    {

        $id = $request->id;

        $old_data = Product::where('id', $id)->first();

        if(Product::where('id', $id)->delete())
        {
            return 'Produkt został usunięty';
        } else {
            return 'Wystąpił bład podczas usuwania produktu';
        }
    }

    

}
