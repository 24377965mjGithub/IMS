<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class SaveEditProductController extends Controller
{
    public function saveEditProduct(Request $request, $id) {
        $request->validate([
            'productCategoryId' => 'required',
            'suppliersId' => 'required',
            'productBarCode' => 'max:225',
            'productName' => 'required',
            'productDescription'=> 'max:225',
            'productPrice' => 'required',
            'productQuantity' => 'required',
            'productUnit' => 'required',
            'productCost' => 'required'
        ]);

        $products = Products::find($id);

        if ($products->update([
            'productCategoryId' => $request->productCategoryId,
            'suppliersId' => $request->suppliersId,
            'productBarCode' => $request->productBarCode,
            'productName' => $request->productName,
            'productDescription' => $request->productDescription,
            'productPrice' => $request->productPrice,
            'productQuantity' => $request->productQuantity,
            'productUnit' => $request->productUnit,
            'productCost' => $request->productCost
        ])) {
            return redirect('/products')->with('productUpadated', $request->productName." Updated Successfully.");
        }
    }
}
