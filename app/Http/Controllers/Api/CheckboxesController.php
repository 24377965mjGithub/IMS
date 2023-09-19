<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\ProductCategory;
use App\Models\ProductFailure;
use App\Models\Products;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class CheckboxesController extends Controller
{
    public function cart() {
        return response()->json(Products::all());
    }

    public function deleteProduct(Request $request) {

        foreach ($request->ids as $value) {
            $deletable = Products::find($value);
            $deletable->delete();
        }
        return response()->json("Product deleted");
    }

    public function deleteProductCategory(Request $request) {

        foreach ($request->ids as $value) {
            $deletable = ProductCategory::find($value);
            $deletable->delete();
        }
        return response()->json("Product category deleted.");
    }

    public function deleteProductFailure(Request $request) {

        foreach ($request->ids as $value) {
            $deletable = ProductFailure::find($value);
            $deletable->delete();
        }
        return response()->json("Record deleted.");
    }

    public function deleteSupplier(Request $request) {

        foreach ($request->ids as $value) {
            $deletable = Suppliers::find($value);
            $deletable->delete();
        }
        return response()->json("Supplier deleted.");
    }

    public function deleteCustomer(Request $request) {

        foreach ($request->ids as $value) {
            $deletable = Customers::find($value);
            $deletable->delete();
        }
        return response()->json("Customer deleted.");
    }
}
