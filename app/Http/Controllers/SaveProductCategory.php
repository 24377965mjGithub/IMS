<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class SaveProductCategory extends Controller
{
    public function saveProductCategory(Request $request, $id) {
        $request->validate([
            'categoryName' => 'required',
            'categoryDescription' => 'required',
            'categoryPackaging' => 'required'
        ]);

        $productCategory = ProductCategory::find($id);

        if ($productCategory->update([
            'categoryName' => $request->categoryName,
            'categoryDescription' => $request->categoryDescription,
            'categoryPackaging' => $request->categoryPackaging
        ])) {
            return redirect('/productcategories')->with('edditedProductCategory', $request->categoryName.' Updated Successfully');
        }
    }
}
