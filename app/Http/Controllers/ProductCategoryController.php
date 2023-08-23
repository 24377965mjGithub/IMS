<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function productCategory() {
        $productCategories = ProductCategory::orderBy('id', 'desc')->paginate(10);
        return view('product-categories', ['productCategories' => $productCategories]);
    }
}
