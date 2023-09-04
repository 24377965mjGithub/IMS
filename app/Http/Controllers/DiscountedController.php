<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerType;

class DiscountedController extends Controller
{
    public function discounted(Request $request) {

        // $customerTypes = CustomerType::all();

        $customerTypes = CustomerType::where([
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('customersType', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);

        return view('discounted', [
            'customerTypes' => $customerTypes
        ]);
    }
}
