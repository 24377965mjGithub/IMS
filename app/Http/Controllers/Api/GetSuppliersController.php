<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliers;

class GetSuppliersController extends Controller
{
    public function getSuppliers() {
        return response()->json(Suppliers::all());
    }
}
