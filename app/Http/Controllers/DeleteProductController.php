<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductIns;

class DeleteProductController extends Controller
{
    public function deleteProduct($id) {
        if (unlink('assets/images/uploads/'.Products::where(['id' => $id])->value('productImage'))) {
            if (Products::where(['id' => $id])->delete()) {
                if (ProductIns::where(['productId' => $id])->delete()) {
                    return redirect('/products')->with('productDeleted', 'Product Deleted Successfully.');
                }
            }
        }
    }
}
