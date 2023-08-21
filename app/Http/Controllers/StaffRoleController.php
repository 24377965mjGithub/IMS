<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Suppliers;
use App\Models\Role;

class StaffRoleController extends Controller
{
    public function staffRole() {
        $productCategories = ProductCategory::all();
        $suppliers = Suppliers::all();
        $roles = Role::all();

        return view('staffrole', [
            'productCategories' => $productCategories,
            'suppliers' =>  $suppliers,
            'roles' => $roles
        ]);
    }
}
