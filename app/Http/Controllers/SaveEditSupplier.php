<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;

class SaveEditSupplier extends Controller
{
    public function saveSupplier(Request $request, $id) {
        $request->validate([
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
            return redirect('/suppliers')->with('edittedSupplier', $request->suppliersName.' Updated Successfully!');
        }
    }
}
