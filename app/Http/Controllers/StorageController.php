<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StorageService;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Flavour;
use App\Models\CategoryBrand;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class StorageController extends Controller
{
    public function __construct(StorageService $storage_service)
    {
        $this->storage_service = $storage_service;
    }

    public function index()
    {
        return $this->view(['storage', 'storage', 'Storage'])
        ->withProducts(Product::all())
        ->withCategories(Category::all())
        ->withBrands(Brand::all())
        ->withFlavours(Flavour::all());
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

    public function update_product(Request $request): JsonResponse
    {
        $message = $this->storage_service->update_product($request);
        return Response::json($message);
    }

    public function delete_product(Request $request): JsonResponse
    {
        $message = $this->storage_service->delete_product($request);
        return Response::json($message);
    }

    public function get_brands(Request $request): JsonResponse
    {
        
        return Response::json(json_encode(Category::find($request->id)->brands));
    }

    public function get_flavours(Request $request): JsonResponse
    {
        if(Brand::find($request->id))
        {
            $flavours = Brand::find($request->id)->flavours;
            return Response::json(json_encode($flavours));
        }else{
            return Response::json(null);
        }
    }
}
