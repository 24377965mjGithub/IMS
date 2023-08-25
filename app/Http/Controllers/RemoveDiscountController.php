<?php

namespace App\Http\Controllers;

use App\Models\CustomerType;
use Illuminate\Http\Request;

class RemoveDiscountController extends Controller
{
    public function removeDiscount($id) {
        $customerType = CustomerType::find($id);

        if ($customerType->update([
            'isDiscounted' => false,
            'discountPercentage' => 0
        ])) {
            return redirect('/discounted')->with('discountRemoved', 'Discount removed successfully.');
        }
    }
}
