<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SaveStaffPasswordController extends Controller
{
    public function saveStaffPassword(Request $request, $id) {
        $request->validate([
            'old_password' => ['required', 'max:225'],
            'new_password' => ['required', 'max:225'],
            'password_confirmation' => ['required', 'max:225']
        ]);

        $staff = User::find($id);
    
        if (Hash::check($request->old_password, $staff->password)) {
            if ($request->new_password === $request->password_confirmation) {
                if ($staff->update([
                    'password' => Hash::make($request->new_password),
                ])) {
                    return redirect('/staffs')->with('staffPasswordUpdatedSuccessfully', 'Staff password updated successfully.');
                }
            } else {
                return redirect('/staffs')->with('staffPasswordNotMatch', 'Password does not match.');
            }
        } else {
            return redirect('/staffs')->with('staffPasswordIncorrect', 'Incorrect password');
        }
        
    }
}
