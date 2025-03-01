<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sellings;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard')
        ->withContent('sellings')
        ->withSellings(Sellings::all())
        ->withCategories(Product::select('category_id')->distinct('category_id')->get())
        ->withFlavours(Product::select('flavour_id')->distinct('flavour_id')->get());
    }
}
