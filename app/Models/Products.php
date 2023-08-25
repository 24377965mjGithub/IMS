<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Products extends Model implements Auditable
{
    use HasFactory;
    
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'productImage',
        'productCategoryId',
        'suppliersId',
        'productBarCode',
        'productName',
        'productDescription',
        'productPrice',
        'productQuantity',
        'productUnit',
        'productStatus',
        'productCost',
    ];
}
