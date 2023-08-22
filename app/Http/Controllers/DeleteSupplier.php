<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;

class DeleteSupplier extends Controller
{
    public function deleteSupplier($id) {

        $suppliers = Suppliers::find($id);

        if ($suppliers->delete()){
            return redirect('/suppliers')->with('deletedSupplier', 'Supplier Deleted  Successfully!');
        }
    }
}
