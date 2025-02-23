<?php

namespace App\Services;
use App\Models\Category;

/**
 * Class CategoryService.
 */
class CategoryService
{
    public function insert($request)
    {
        $request->validate([
            'category' => 'required|unique:categories'
        ]);

       if(Category::Create([
            'category' => $request->category,
        ]))
        {
            return ['success' => 'Kategoria dodana'];
        }else{
            return ['error' => 'Błąd podczas dodawania kategorii'];
        }
    }
}
