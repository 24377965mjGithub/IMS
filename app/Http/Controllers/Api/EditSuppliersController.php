<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliers;

class EditSuppliersController extends Controller
{
    public function saveSupplier(Request $request) {
        $request->validate([
            'id' => 'required',
            'suppliersName' => 'required',
            'suppliersPhoneNumber' => 'required|max:13',
            'suppliersEmail' => 'required|string|email|max:255'
        ]);

        $id = $request->id;

        if (Suppliers::where(['id' => $id])->update([
            'suppliersName' => $request->suppliersName,
            'suppliersPhoneNumber' => $request->suppliersPhoneNumber,
            'suppliersEmail' => $request->suppliersEmail
        ])) {
            return "Supplier updated successfully";
        }
    }
}
