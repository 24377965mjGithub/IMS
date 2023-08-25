<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerType;

class SaveEditDiscountController extends Controller
{
    public function saveEditDiscount(Request $request, $id) {
        $request->validate([
            'discount' => 'required'
        ]);

        $customerType = CustomerType::find($id);

        if ($customerType->update([
            'discountPercentage' => $request->discount
        ])) {
            return redirect('/discounted')->with('discountUpdatedSuccessfully', 'DIscount updated successfully');
        }
    }
}
