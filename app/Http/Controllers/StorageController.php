<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StorageService;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Flavour;

class StorageController extends Controller
{
    public function __construct(StorageService $storage_service)
    {
        $this->storage_service = $storage_service;
    }

    public function index()
    {
        return $this->view(['storage', 'storage', 'Storage'])->withProducts(Product::all());
    }

    public function new_product_view()
    {
        return $this->view(['storage', 'new_product', null])->withLists(
        [
            'Categories' => Category::all(),
            'Brands' => Brand::all(),
            'Flavours' => Flavour::all(),
        ]);
    }

    public function new_product(Request $request)
    {
        $message = $this->storage_service->new_product($request);
        return redirect()->back()->with('message', $message);
    }
}
