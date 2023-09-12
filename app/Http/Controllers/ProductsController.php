<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Suppliers;
use App\Models\Products;
use Illuminate\Database\Eloquent\Collection;

class ProductsController extends Controller
{
    public function products(Request $request) {
        $productCategories = ProductCategory::all();
        // $products = Products::orderBy('id', 'desc')->paginate(10);
        $suppliers = Suppliers::all();
        $customers = Customers::all();

        $products = Products::where([
            ['productName', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('productName', 'LIKE', '%' . $search . '%')
                        ->orWhere('productBarCode', 'LIKE', '%' . $search . '%')
                        ->orWhere('productDescription', 'LIKE', '%' . $search . '%')
                        ->orWhere('productUnit', 'LIKE', '%' . $search . '%')
                        ->orWhere('productStatus', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }],
            [function ($query) use ($request) {
                if (($categoryfilter = $request->categoryfilter)) {
                    $query->orWhere('productCategoryId', $categoryfilter)
                        ->get();
                }
            }],
            [function ($query) use ($request) {
                if (($suppliersfilter = $request->suppliersfilter)) {
                    $query->orWhere('suppliersId', $suppliersfilter)
                        ->get();
                }
            }]
        ])->orderBy('id', 'desc')->paginate(10);

        $units = [
            'Piece',
            'Box',
            'Meter',
            'Mass',
            'Ampere',
            'Gram',
            'Foot',
            'Kilometer',
            'Cubic Meter',
            'Millimeter',
            'Length',
            'Second',
            'Temperature',
            'Litre',
            'Centigrade',
            'Gallon',
            'Milliliter',
            'Mile',
            'Kilogram',
            'Kelvin',
            'Mole',
            'Centimeter',
            'Inch',
            'Yard',
            'Milligram',
            'Ton'
        ];

        return view('products', [
            'productCategories' => $productCategories,
            'suppliers' =>  $suppliers,
            'products'  => $products,
            'customers' => $customers,
            'units' => $units
        ]);
    }
}
