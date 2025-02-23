<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return $this->view(['storage', 'new_category', null]);
    }

    public function insert(Request $request)
    {
        $result = $this->categoryService->insert($request);
        return redirect()->back()->withMessage($result);
    }
}
