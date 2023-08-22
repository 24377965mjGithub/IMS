<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SaveStaffEmailController extends Controller
{
    public function saveStaffEmail(Request $request, $id) {
        $request->validate([
            'email' => ['required', 'string', 'max:255', 'unique:users']
        ]);

        $staff = User::find($id);
    
        if ($staff->update([
            'email_verified_at' => null,
            'email' => $request->email
        ])) {
            return redirect('/staffs')->with('staffEmailUpdatedSuccessfully', 'Staff email updated successfully.');
        }
    }
}
