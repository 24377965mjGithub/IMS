<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductFailure;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;


class SaveProductFailureController extends Controller
{
    public function saveProductFailure(Request $request, $productCategoryId, $suppliersId, $productId) {
        $request->validate([
            'reason' => 'required',
            'quantity' => 'required'
        ]);

        $userId = Auth::id();

        if (ProductFailure::create([
            'productCategoryId' => $productCategoryId,
            'suppliersId' => $suppliersId,
            'productId' => $productId,
            'reason' => $request->reason,
            'quantity' => $request->quantity,
            'userId' => $userId
        ])) {

            $currentProductQuantity = Products::where(['id' => $productId])->value('productQuantity');
            $newQuantity = $currentProductQuantity - $request->quantity;

            // decrease the current quantity of the product
            if (Products::where(['id' => $productId])->update([
                'productQuantity' => $newQuantity
            ])) {

                if ($newQuantity <= 0) {
                    Products::where(['id' => $productId])->update([
                        'productStatus' => 'not available'
                    ]);
                }

                return redirect('/products')->with('productFailureSave', 'Product failure saved successfully');
            }

        }
    }
}
