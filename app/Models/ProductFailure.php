<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFailure extends Model
{
    use HasFactory;

    protected $fillable = [
        'productCategoryId',
        'suppliersId',
        'productId',
        'reason',
        'quantity',
        'userId',
    ];
}
