<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SaveStaffNameController extends Controller
{

    public function saveStaffName(Request $request, $id) {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255']
        ]);

        $staff = User::find($id);
    
        if ($staff->update([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname
        ])) {
            return redirect('/staffs')->with('staffUpdatedSuccessfully', $request->firstname.' updated successfully');
        }
    }
}
