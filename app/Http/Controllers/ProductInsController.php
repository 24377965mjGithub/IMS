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
    public function productIns(Request $request) {

        // $productIns = ProductIns::orderBy('id', 'desc')->paginate(10);
        $productCategories = ProductCategory::all();
        $suppliers = Suppliers::all();
        $products = Products::all();
        $users = User::all();
        $roles = Role::all();

        if ($request->filterSupplier === "allsuppliers") {
            $productIns = ProductIns::where([
                [function ($query) use ($request) {
                    if (($filterDate = $request->filterDate)) {
                        $query->orWhere('created_at', 'LIKE', '%' . $filterDate . '%')
                            ->get();
                    }
                }]
            ])->orderBy('id', 'desc')->paginate(10);
        } else {
            $productIns = ProductIns::where([
                [function ($query) use ($request) {
                    if (($filterDate = $request->filterDate)) {
                        $query->where('created_at', 'LIKE', '%' . $filterDate . '%')
                        ->where(['suppliersId' => $request->filterSupplier])
                            ->get();
                    }
                }]
            ])->orderBy('id', 'desc')->paginate(10);
        }

        // $products = Products::

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
