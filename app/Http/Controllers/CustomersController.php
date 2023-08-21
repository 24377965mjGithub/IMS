<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerType;
use App\Models\Customers;

class CustomersController extends Controller
{
    public function customers() {
        $customerTypes = CustomerType::all();
        $customers = Customers::orderBy('id', 'desc')->paginate(5);
        return view('customers', [
            'customerTypes' => $customerTypes,
            'customers' => $customers
        ]);
    }
}
