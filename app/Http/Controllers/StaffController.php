<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class StaffController extends Controller
{
    public function staff(Request $request) {

        $roles = Role::all();
        // $staffs = User::all();

        $staffs = User::where([
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('firstname', 'LIKE', '%' . $search . '%')
                    ->orWhere('middlename', 'LIKE', '%' . $search . '%')
                    ->orWhere('lastname', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }],
        ])->orderBy('id', 'desc')->paginate(10);

        return view('/staffs', ['roles' => $roles, 'staffs' => $staffs]);
    }
}
