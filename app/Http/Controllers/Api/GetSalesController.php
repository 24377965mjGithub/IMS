<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductOuts;
use App\Models\ProductIns;
use App\Models\Products;

class GetSalesController extends Controller
{
    public function getSales() {
        return response()->json([
            'productIns' => ProductIns::all(),
            'productOuts' => ProductOuts::all(),
            'products' => Products::all()
        ]);
    }
}
