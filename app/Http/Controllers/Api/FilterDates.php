<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductOuts;
use Carbon\Carbon;
use App\Models\CustomerType;
use App\Models\ProductIns;
use App\Models\Products;

class FilterDates extends Controller
{
    public function filterDateSales(Request $request) {

        $start = Carbon::createFromFormat('Y-m-d', $request->from)->startOfDay();
        $end = Carbon::createFromFormat('Y-m-d', $request->to)->endOfDay();

        $date = ProductOuts::whereBetween('created_at', [$start, $end])->get();

        return response()->json([
            'filterSales' => $date,
            'productIns' => ProductIns::all(),
            'products' => Products::all(),
            'customerTypes' => CustomerType::all()
        ]);
    }

    public function filterDateExpenses(Request $request) {

        $start = Carbon::createFromFormat('Y-m-d', $request->from)->startOfDay();
        $end = Carbon::createFromFormat('Y-m-d', $request->to)->endOfDay();

        $date = ProductIns::whereBetween('created_at', [$start, $end])->get();

        return response()->json([
            'filterExpenses' => $date,
            'productOuts' => ProductOuts::all(),
            'products' => Products::all(),
            'customerTypes' => CustomerType::all()
        ]);
    }
}
