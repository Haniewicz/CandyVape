<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FlavourService;
use App\Models\Brand;

class FlavourController extends Controller
{
    public function __construct(FlavourService $flavourService)
    {
        $this->flavourService = $flavourService;
    }

    public function index()
    {
        return $this->view(['storage', 'new_flavour', null])->withBrands(Brand::all());
    }

    public function insert(Request $request)
    {
        $result = $this->flavourService->insert($request);
        return redirect()->back()->withMessage($result);
    }

}
