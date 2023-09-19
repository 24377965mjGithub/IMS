<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\CustomerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartCustomerController extends Controller
{
    public function getCustomers() {
        return response()->json([
            'customers' => Customers::all(),
            'customerTypes' => CustomerType::all(),
            'staff' => Auth::id()
        ]);
    }
}
