<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;
use Illuminate\Database\Eloquent\Collection;

class SuppliersController extends Controller
{
    public function suppliers(Request $request) {
        // $suppliers = Suppliers::orderBy('id', 'desc')->paginate(10);

        $suppliers = Suppliers::where([
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('suppliersName', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);

        return view('suppliers', ['suppliers' => $suppliers]);
    }
}
