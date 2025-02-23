<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BrandService;
use App\Models\Category;

class BrandController extends Controller
{
    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        return $this->view(['storage', 'new_brand', null])->withCategories(Category::all());
    }

    public function insert(Request $request)
    {
        $result = $this->brandService->insert($request);
        return redirect()->back()->withMessage($result);
    }
}
