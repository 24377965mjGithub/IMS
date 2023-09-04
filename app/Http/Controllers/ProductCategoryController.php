<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function productCategory(Request $request) {
        // $productCategories = ProductCategory::orderBy('id', 'desc')->paginate(10);

        $productCategories = ProductCategory::where([
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('categoryName', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }],
        ])->orderBy('id', 'desc')->paginate(10);

        return view('product-categories', ['productCategories' => $productCategories]);
    }
}
