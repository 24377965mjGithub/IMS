<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductIns;

class DeleteProductController extends Controller
{
    public function deleteProduct($id) {

        $products = Products::find($id);
        $productIns = ProductIns::find($id);

        if (unlink('assets/images/uploads/'.Products::where('id', $id)->value('productImage'))) {
            if ($products->delete()) {
                if ($productIns->delete()) {
                    return redirect('/products')->with('productDeleted', 'Product Deleted Successfully.');
                }
            }
        }

        // return 'assets/images/uploads/'.$products->value('productImage');
        // return dd(Products::where('id', $id)->value('productImage'));
    }
}
