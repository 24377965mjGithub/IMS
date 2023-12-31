<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ProductIns;

class ProductUploadController extends Controller
{
    public function productUpload(Request $req) {
        $req->validate([
            'productImage' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'productCategoryId' => 'required',
            'suppliersId' => 'required',
            'productBarCode' => 'max:13',
            'productName' => 'required',
            'productDescription'=> 'max:225',
            'productPrice' => 'required',
            'productQuantity' => 'required',
            'productUnit' => 'required',
            'productCost' => 'required'
        ]);

        // get user role

        $userId = Auth::id();
        $userRole = User::where(['id' => $userId])->value('role');

        // end user role

        if($req->file()) {

            $fileName = sha1('productBarCode'.time()) . '.'. $req->productImage->extension();

            $type = $req->productImage->getClientMimeType();
            $size = $req->productImage->getSize();

            if ($product = Products::insertGetId([  // insert product on the product table
                'productImage' => $fileName,
                'productCategoryId' => $req->productCategoryId,
                'suppliersId' => $req->suppliersId,
                'productBarCode' => $req->productBarCode,
                'productName' => $req->productName,
                'productDescription' => $req->productDescription,
                'productPrice' => $req->productPrice,
                'productQuantity' => $req->productQuantity,
                'productUnit' => $req->productUnit,
                'productStatus' => 'Available',
                'productCost'  => $req->productCost
            ])) {

                if (ProductIns::create([ // insert product on product ins table
                    'productCategoryId' => $req->productCategoryId,
                    'suppliersId' => $req->suppliersId,
                    'productId' => $product,
                    'userId' => $userId,
                    'userRoleId' => $userRole,
                    'quantity' => $req->productQuantity
                ])) {

                    $req->productImage->move(public_path('assets/images/uploads'), $fileName);
                    return redirect('/products')->with('productUploaded', 'Product Uploaded Successfully.');
                }
            }
        }
    }
}
