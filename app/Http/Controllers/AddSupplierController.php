<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;

class AddSupplierController extends Controller
{
    public function addSupplier(Request $request) {
        $request->validate([
            'suppliersName' => 'required',
            'suppliersPhoneNumber' => 'required|max:13|unique:suppliers',
            'suppliersEmail' => 'required|string|email|max:255|unique:suppliers'
        ]);

        if (Suppliers::create([
            'suppliersName' => $request->suppliersName,
            'suppliersPhoneNumber' => $request->suppliersPhoneNumber,
            'suppliersEmail' => $request->suppliersEmail,
        ])) {
            // session()->put('newSupplier', )
            return redirect('/suppliers')
            ->with('newSupplier', 'New Supplier Added Successfully!');
        }
    }
}
