<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductCategory;
use App\Models\ProductOuts;
use App\Models\Suppliers;
use App\Models\User;
use App\Models\Role;

class ProductOutController extends Controller
{
    public function productOuts() {

        $productCategories = ProductCategory::all();
        $suppliers = Suppliers::all();
        $products = Products::all();
        $users = User::all();
        $roles = Role::all();
        $customers = Customers::all();

        $productOuts = ProductOuts::orderBy('id', 'desc')->paginate(10);

        return view('productouts', [
            'productCategories' => $productCategories,
            'suppliers' =>  $suppliers,
            'products' => $products,
            'users' => $users,
            'roles' => $roles,
            'productOuts' =>  $productOuts,
            'customers' => $customers
        ]);
    }
}
