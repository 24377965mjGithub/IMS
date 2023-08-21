<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class SaveRoleController extends Controller
{
    public function saveRole(Request $request) {
        $request->validate([
            'roleName' => 'required'
        ]);

        if (Role::create(['roleName' => $request->roleName])) {
            return redirect('/staffroles')->with('roleNameSave', 'Staff role added successfully.');
        }
    }
}
