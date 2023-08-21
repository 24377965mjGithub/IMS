<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class DeleteCustomerController extends Controller
{
    public function deleteCustomer($id) {
        if (Customers::where(['id' => $id])->delete()) {
            return redirect('/customers')->with('customerDeleted', 'Customer deleted succesfully.');
        }
    }
}
