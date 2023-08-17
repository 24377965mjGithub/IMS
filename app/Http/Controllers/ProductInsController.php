<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductIns;
use App\Models\Products;
use App\Models\ProductCategory;
use App\Models\Suppliers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class ProductInsController extends Controller
{
    public function productIns() {

        $productIns = ProductIns::orderBy('id', 'desc')->paginate(5);
        $productCategories = ProductCategory::all();
        $suppliers = Suppliers::all();
        $products = Products::all();
        $users = User::all();
        $roles = Role::all();

        return view('/productins', [
            'productCategories' => $productCategories,
            'suppliers' =>  $suppliers,
            'productIns' => $productIns,
            'products' => $products,
            'users' => $users,
            'roles' => $roles
        ]);
    }
}
