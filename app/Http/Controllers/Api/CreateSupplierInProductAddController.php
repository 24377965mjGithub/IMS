<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class CreateSupplierInProductAddController extends Controller
{
    public function addSupplierOnProductAdd(Request $request) {
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
            return response()->json('New supplier added successfully');
        }
    }

    public function loadSuppliers() {
        return response()->json(Suppliers::all());
    }
}
