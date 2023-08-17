<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Suppliers;
use App\Models\Products;
use Illuminate\Database\Eloquent\Collection;

class ProductsController extends Controller
{
    public function products() {
        $productCategories = ProductCategory::all();
        $products = Products::paginate(5);
        $suppliers = Suppliers::all();
        return view('products', [
            'productCategories' => $productCategories,
            'suppliers' =>  $suppliers,
            'products'  => $products
        ]);
    }
}
