<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class SaveProductImageController extends Controller
{
    public function saveProductImage(Request $request, $id) {
        $request->validate([
            'productImage' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // $fileModel = new File;

        if($request->file()) {

            $fileName = time() . '.'. $request->productImage->extension();  

            $type = $request->productImage->getClientMimeType();
            $size = $request->productImage->getSize();

            $products = Products::find($id);

            if (unlink('assets/images/uploads/'.Products::where(['id' => $id])->value('productImage'))) {
                if ($products->update([
                    'productImage' => $fileName,
                ])) {
                    $request->productImage->move(public_path('assets/images/uploads'), $fileName);
                    return redirect('/products')->with('productImgUploaded', 'Product Image Updated Successfully.');
                }
            }
            
        }
    }
}
