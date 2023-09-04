<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Suppliers;
use App\Models\Role;

class StaffRoleController extends Controller
{
    public function staffRole(Request $request) {
        $productCategories = ProductCategory::all();
        $suppliers = Suppliers::all();
        // $roles = Role::all();

        $roles = Role::where([
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('roleName', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);

        return view('staffrole', [
            'productCategories' => $productCategories,
            'suppliers' =>  $suppliers,
            'roles' => $roles
        ]);
    }
}
