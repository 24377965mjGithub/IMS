<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductIns;
use App\Models\Products;

class ProductInForm extends Component
{
    // data  from component
    public $productCategoryId;
    public $suppliersId;
    public $productId;
    public $userId;
    public $userRoleId;

    public $quantity = '';

    // notification
    public $notify = '';
    public $isError = false;

    public function addQuantity() {
        if (ProductIns::create([ // insert product on product ins table
            'productCategoryId' => $this->productCategoryId,
            'suppliersId' => $this->suppliersId,
            'productId' => $this->productId,
            'userId' => $this->userId,
            'userRoleId' => $this->userRoleId,
            'quantity' => $this->quantity
        ])) {

            

            // update the current quantity
            $currentQuantity = Products::where(['id' => $this->productId])->value('productQuantity');
            $newQuantity = $currentQuantity + $this->quantity;

            if ($newQuantity >= 1) {
                Products::where(['id' => $this->productId])->update([
                    'productStatus' => 'available'
                ]);
            }

            if (Products::where(['id' => $this->productId])->update([
                'productQuantity' => $newQuantity
            ])) {
                $this->notify = $this->quantity.' quantity has been added. Current quantity is '.$currentQuantity + $this->quantity;
            }
        }
    }

    public function render()
    {
        return view('livewire.product-in-form', [
            'notify' => $this->notify,
            'isError' => $this->isError
        ]);
    }
}
