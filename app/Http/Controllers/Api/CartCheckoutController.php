<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductOuts;
use App\Models\User;
use App\Models\Products;

class CartCheckoutController extends Controller
{
    public function checkout(Request $request){

        // required data
        /*
            productCategoryId
            suppliersId
            productId
            customersId
            customersTypeId,
            userId
            userRoleId,
            quantity
        */

        foreach ($request->products as $key => $value) {
            $productCategoryId = Products::where('id', $value['productId'])->value('productCategoryId');
            $suppliersId = Products::where('id', $value['productId'])->value('suppliersId');
            $productId = Products::where('id', $value['productId'])->value('id');
            $customersId = $request->customer;
            $customersTypeId = Customers::where('id', $customersId)->value('customersType');
            $userId = Auth::id();
            $userRoleId = User::where('id', $userId)->value('role');

            if (!$value['quantity']) {
                $quantity = 0;
            } else {
                $quantity = $value['quantity'];
            }

            if (ProductOuts::create([
                'productCategoryId' => $productCategoryId,
                'suppliersId' => $suppliersId,
                'productId' => $productId,
                'customersId' => $customersId,
                'customersTypeId' => $customersTypeId,
                'userId' => $userId,
                'userRoleId' => $userRoleId,
                'quantity' => $quantity
            ])) {

                $currentProductQuantity = Products::where(['id' => $productId])->value('productQuantity');
                $newQuantity = $currentProductQuantity - $quantity;

                // decrease the current quantity of the product
                if (Products::where(['id' => $productId])->update([
                    'productQuantity' => $newQuantity
                ])) {

                    if ($newQuantity <= 0) {
                        Products::where(['id' => $productId])->update([
                            'productStatus' => 'Not available'
                        ]);
                    }
                }
            }
        }

        return response()->json([
            'customer' => $request->customer,
            'products' => $request->products
        ]);
    }
}
