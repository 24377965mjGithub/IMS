<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CreateCategoryInProductAddController extends Controller
{
    public function addCategoryOnProductAdd(Request $request) {
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
            return response()->json('New category added successfully');
        }
    }

    public function loadCategories() {
        return response()->json(ProductCategory::all());
    }
}
