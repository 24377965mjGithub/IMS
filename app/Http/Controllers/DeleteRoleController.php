<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class DeleteRoleController extends Controller
{
    public function deleteRole($id) {
        if (Role::where('id', $id)->delete()) {
            return redirect('/staffroles')->with('roleDeleted', 'Role deleted succesfully.');
        }
    }
}
