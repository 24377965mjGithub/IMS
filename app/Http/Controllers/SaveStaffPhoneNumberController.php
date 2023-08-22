<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SaveStaffPhoneNumberController extends Controller
{
    public function saveStaffPhoneNumber(Request $request, $id) {
        $request->validate([
            'phonenumber' => ['required', 'max:13', 'unique:users']
        ]);

        $staff = User::find($id);
    
        if ($staff->update([
            'phonenumber' => $request->phonenumber
        ])) {
            return redirect('/staffs')->with('staffPhoneNumberUpdatedSuccessfully', 'Staff phone number updated successfully.');
        }
    }
}
