<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sellings;

class SellingsController extends Controller
{
    public function index()
    {
        return view('contents.sellings')->withSellings(Sellings::all())->withCategories(Category::all());
    }
}
