<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerType;

class DiscountedController extends Controller
{
    public function discounted() {

        $customerTypes = CustomerType::all();

        return view('discounted', [
            'customerTypes' => $customerTypes
        ]);
    }
}
