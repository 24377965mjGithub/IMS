<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Suppliers;
use App\Models\Products;
use Illuminate\Database\Eloquent\Collection;

class ProductsController extends Controller
{
    public function products() {
        $productCategories = ProductCategory::all();
        $products = Products::orderBy('id', 'desc')->paginate(10);
        $suppliers = Suppliers::all();
        $customers = Customers::all();

        return view('products', [
            'productCategories' => $productCategories,
            'suppliers' =>  $suppliers,
            'products'  => $products,
            'customers' => $customers
        ]);
    }
}
