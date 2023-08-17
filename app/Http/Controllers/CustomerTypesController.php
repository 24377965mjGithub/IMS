<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerTypesController extends Controller
{
    public function customerTypes() {
        return view('customer-types');
    }
}
