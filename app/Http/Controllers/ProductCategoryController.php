<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function productCategory() {
        $productCategories = ProductCategory::paginate(5);
        return view('product-categories', ['productCategories' => $productCategories]);
    }
}
