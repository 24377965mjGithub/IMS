<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIns extends Model
{
    use HasFactory;

    protected $fillable = [
        'productCategoryId',
        'suppliersId',
        'productId',
        'userId',
        'userRoleId',
        'quantity'
    ];
}
