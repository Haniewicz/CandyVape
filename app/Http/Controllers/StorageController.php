<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function index()
    {
        return $this->view(['storage', 'storage', null]);
    }

    public function new_product_view()
    {
        return $this->view(['storage', 'new_product', null]);
    }
}
