<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductCategory;
use App\Models\ProductFailure;
use App\Models\Suppliers;
use App\Models\User;
use App\Models\Role;

class ProductFailureController extends Controller
{
    public function productFailure(Request $request) {
        $productCategories = ProductCategory::all();
        $suppliers = Suppliers::all();
        $products = Products::all();
        $users = User::all();
        $roles = Role::all();
        // $productFailures = ProductFailure::orderBy('id', 'desc')->paginate(10);

        $productFailures = ProductFailure::where([
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('created_at', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);

        return view('productfailures',  [
            'productCategories' => $productCategories,
            'suppliers' =>  $suppliers,
            'products' => $products,
            'users' => $users,
            'roles' => $roles,
            'productFailures' => $productFailures
        ]);
    }
}
