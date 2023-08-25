<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerType;

class AddDiscountController extends Controller
{
    public function addDiscount(Request $request) {
        $request->validate([
            'customerTypeId' => 'required',
            'discount' => 'required',
        ]);

        $customerType = CustomerType::where('id', $request->customerTypeId);

        if (!$customerType->value('isDiscounted')) {
            if ($customerType->update([
                'isDiscounted' => true,
                'discountPercentage' => $request->discount
            ])) {
                return redirect('/discounted')->with('discountAddedSuccessfully', 'Discount added successfully.');
            }
        } else {
            return redirect('/discounted')->with('discountAlreadyAdded', 'Discount for '.$customerType->value('customersType').' already added');
        }
    }
}
