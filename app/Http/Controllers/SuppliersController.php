<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;
use Illuminate\Database\Eloquent\Collection;

class SuppliersController extends Controller
{
    public function suppliers() {
        $suppliers = Suppliers::paginate(5);
        return view('suppliers', ['suppliers' => $suppliers]);
    }
}
