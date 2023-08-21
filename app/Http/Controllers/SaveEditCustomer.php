<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class SaveEditCustomer extends Controller
{
    public function saveEditCustomer(Request $request, $id) {
        $request->validate([
            'customersName' => 'required',
            'customersType' => 'required'
        ]);

        if (Customers::where(['id' => $id])->update([
            'customersName' => $request->customersName,
            'customersType' => $request->customersType
        ])) {
            return redirect('/customers')->with('customerUpdated', $request->customersName.'  updated sucessfully');
        }
    }
}
