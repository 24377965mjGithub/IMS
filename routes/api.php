<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AddSupplierController;
use App\Http\Controllers\Api\GetSuppliersController;
use App\Http\Controllers\Api\EditSuppliersController;
use App\Http\Controllers\Api\GetSalesController;
use App\Http\Controllers\Api\CreateCategoryInProductAddController;
use App\Http\Controllers\Api\CreateSupplierInProductAddController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// get

Route::middleware('auth:sanctum')->get('/getsuppliers',[GetSuppliersController::class, 'getSuppliers']);
Route::middleware('auth:sanctum')->get('/getsales',[GetSalesController::class, 'getSales']);
Route::middleware('auth:sanctum')->get('/loadproductcategories',[CreateCategoryInProductAddController::class, 'loadCategories']);
Route::middleware('auth:sanctum')->get('/loadproductsuppliers',[CreateSupplierInProductAddController::class, 'loadSuppliers']);

// put

Route::middleware('auth:sanctum')->post('/editsupplier',[EditSuppliersController::class, 'saveSupplier']);
Route::middleware('auth:sanctum')->post('/addcategoryonproductadd',[CreateCategoryInProductAddController::class, 'addCategoryOnProductAdd']);
Route::middleware('auth:sanctum')->post('/addsupplieronproductadd',[CreateSupplierInProductAddController::class, 'addSupplierOnProductAdd']);

// post

Route::middleware('auth:sanctum')->post('/addsupplier',[AddSupplierController::class, 'addSupplier']);