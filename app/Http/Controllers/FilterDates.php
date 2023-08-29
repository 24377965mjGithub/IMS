<?php

namespace App\Http\Controllers;

use App\Models\ProductOuts;
use Illuminate\Http\Request;

class FilterDates extends Controller
{
    public function filterDateSales(Request $request) {
        $request->validate([
            'from' => 'required',
            'to' => 'required'
        ]);

        $filterSales = ProductOuts::whereBetween('created_at', [$request->from, $request->to])->get();

        session()->put('filterSales', $filterSales);

        return back();
    }
}
