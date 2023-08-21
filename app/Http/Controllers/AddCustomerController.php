<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class AddCustomerController extends Controller
{
    public function addCustomer(Request $request) {
        $request->validate([
            'customersName' => 'required',
            'customerType' => 'required'
        ]);

        if (Customers::create([
            'customersName' => $request->customersName,
            'customersType' => $request->customerType
        ]))  {
            return redirect('/customers')->with('customerAdded', $request->customersName.' added succesfully.');
        }
    }
}
