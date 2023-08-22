<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TerminateStaffController extends Controller
{
    public function terminateStaff($id) {

        $staff = User::find($id);

        if ($id != 1) {
            if ($staff->delete()) {
                return redirect('/staffs')->with('staffTerminated', 'Staff terminated successfully.');
            }
        } else {
            return redirect('/staffs')->with('adminTerminateError', 'Admin cannot be terminated.');
        }
    }
}
