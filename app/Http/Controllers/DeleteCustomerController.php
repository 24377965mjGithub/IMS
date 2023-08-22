<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class DeleteCustomerController extends Controller
{
    public function deleteCustomer($id) {

        $customer = Customers::find($id);

        if ($customer->delete()) {
            return redirect('/customers')->with('customerDeleted', 'Customer deleted succesfully.');
        }
    }
}
