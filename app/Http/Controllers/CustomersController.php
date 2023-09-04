<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerType;
use App\Models\Customers;

class CustomersController extends Controller
{
    public function customers(Request $request) {
        $customerTypes = CustomerType::all();
        $customers = Customers::orderBy('id', 'desc')->paginate(5);

        $customers = Customers::where([
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('customersName', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);

        return view('customers', [
            'customerTypes' => $customerTypes,
            'customers' => $customers
        ]);
    }
}
