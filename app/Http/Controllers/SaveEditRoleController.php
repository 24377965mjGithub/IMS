<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class SaveEditRoleController extends Controller
{
    public function saveEditRole(Request $request, $id) {
        $request->validate([
            'roleName' => "required"
        ]);

        $role = Role::find($id);

        if ($role->update(['roleName' => $request->roleName])) {
            return redirect('/staffroles')->with('roleNameEditSave', $request->roleName.' updated successfully.');
        }
    }
}
