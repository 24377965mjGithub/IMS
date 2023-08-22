<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ProductIns extends Model implements Auditable
{
    use HasFactory;
    
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'productCategoryId',
        'suppliersId',
        'productId',
        'userId',
        'userRoleId',
        'quantity'
    ];
}
