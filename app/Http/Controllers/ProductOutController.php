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
    public function productOuts(Request $request) {

        $productCategories = ProductCategory::all();
        $suppliers = Suppliers::all();
        $products = Products::all();
        $users = User::all();
        $roles = Role::all();
        $customers = Customers::all();

        if ($request->filterCustomer === "allcustomers") {
            $productOuts = ProductOuts::where([
                [function ($query) use ($request) {
                    if (($filterDate = $request->filterDate)) {
                        $query->orWhere('created_at', 'LIKE', '%' . $filterDate . '%')
                            ->get();
                    }
                }]
            ])->orderBy('id', 'desc')->paginate(10);
        } else {
            $productOuts = ProductOuts::where([
                [function ($query) use ($request) {
                    if (($filterDate = $request->filterDate)) {
                        $query->where('created_at', 'LIKE', '%' . $filterDate . '%')
                        ->where(['customersId' => $request->filterCustomer])
                            ->get();
                    }
                }]
            ])->orderBy('id', 'desc')->paginate(10);
        }

        // $productOuts = ProductOuts::orderBy('id', 'desc')->paginate(10);

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
