<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SaveStaffController extends Controller
{
    public function saveStaff(Request $request) {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phonenumber' => ['required', 'string', 'max:13', 'unique:users'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (User::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'phonenumber' => $request->phonenumber,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])) {
            return redirect('/staffs')->with('staffAddedSuccessfully', 'Staff added successfully');
        }
    }
}
