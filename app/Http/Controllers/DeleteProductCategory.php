<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class DeleteProductCategory extends Controller
{
    public function deleteProductCategory($id) {
        if (ProductCategory::where(['id' => $id])->delete()) {
            return redirect('/productcategories')->with('deletedProductCategory', 'Product Category Deleted Successfully');
        }
    }
}
