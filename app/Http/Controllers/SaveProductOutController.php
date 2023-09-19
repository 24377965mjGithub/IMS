<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductOuts;
use App\Models\User;
use App\Models\Products;

class SaveProductOutController extends Controller
{
    public function saveProductOut(Request $request, $productCategoryId, $suppliersId, $productId) {

        $request->validate([
            'customer' => 'required',
            'quantity' => 'required'
        ]);

        // get user
        $userId = Auth::id();
        $userRoleId = User::where(['id' => $userId])->value('role');

        // get customer type
        $customerTypeId = Customers::where(['id' => $request->customer])->value('customersType');

        if (ProductOuts::create([
            'productCategoryId' => $productCategoryId,
            'suppliersId' => $suppliersId,
            'productId' => $productId,
            'customersId' => $request->customer,
            'customersTypeId' => $customerTypeId,
            'userId' => $userId,
            'userRoleId' => $userRoleId,
            'quantity' => $request->quantity
        ])) {

            $currentProductQuantity = Products::where(['id' => $productId])->value('productQuantity');
            $newQuantity = $currentProductQuantity - $request->quantity;

            // decrease the current quantity of the product
            if (Products::where(['id' => $productId])->update([
                'productQuantity' => $newQuantity
            ])) {

                if ($newQuantity <= 0) {
                    Products::where(['id' => $productId])->update([
                        'productStatus' => 'Not available'
                    ]);
                }

                return redirect('/products')->with('productOutSave', 'Product out saved successfully');
            }
        }
    }
}
