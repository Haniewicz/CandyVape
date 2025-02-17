<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellingsController extends Controller
{
    public function index()
    {
        return view('contents.sellings');
    }
}
