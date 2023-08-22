<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class StaffController extends Controller
{
    public function staff() {

        $roles = Role::all();
        $staffs = User::all();

        return view('/staffs', ['roles' => $roles, 'staffs' => $staffs]);
    }
}
