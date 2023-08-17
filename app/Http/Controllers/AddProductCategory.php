<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class AddProductCategory extends Controller
{
    public function addProductCategory(Request $request) {
        $request->validate([
            'categoryName' => 'required|unique:product_categories',
            'categoryDescription' => 'required',
            'categoryPackaging' => 'required'
        ]);

        if (ProductCategory::create([
            'categoryName' => $request->categoryName,
            'categoryDescription' => $request->categoryDescription,
            'categoryPackaging' => $request->categoryPackaging,
        ])) {
            return redirect('/productcategories')->with('newProducrCategory', 'Product Category Added Successfully');
        }
    }
}
