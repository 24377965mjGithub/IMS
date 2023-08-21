<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOuts extends Model
{
    use HasFactory;

    protected $fillable = [
        'productCategoryId',
        'suppliersId',
        'productId',
        'customersId', // form
        'customersTypeId',
        'userId',
        'userRoleId',
        'quantity' // form
    ];
}
