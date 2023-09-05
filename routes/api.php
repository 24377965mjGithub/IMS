<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AddSupplierController;
use App\Http\Controllers\Api\CheckboxesController;
use App\Http\Controllers\Api\GetSuppliersController;
use App\Http\Controllers\Api\EditSuppliersController;
use App\Http\Controllers\Api\GetSalesController;
use App\Http\Controllers\Api\CreateCategoryInProductAddController;
use App\Http\Controllers\Api\CreateSupplierInProductAddController;
use App\Http\Controllers\Api\FilterDates;
use App\Http\Controllers\Api\GetModels;

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
Route::middleware('auth:sanctum')->get('/getmodels',[GetModels::class, 'getProducts']);

// put

Route::middleware('auth:sanctum')->post('/editsupplier',[EditSuppliersController::class, 'saveSupplier']);
Route::middleware('auth:sanctum')->post('/addcategoryonproductadd',[CreateCategoryInProductAddController::class, 'addCategoryOnProductAdd']);
Route::middleware('auth:sanctum')->post('/addsupplieronproductadd',[CreateSupplierInProductAddController::class, 'addSupplierOnProductAdd']);
Route::middleware('auth:sanctum')->post('/filter-sales',[FilterDates::class, 'filterDateSales']);
Route::middleware('auth:sanctum')->post('/filter-expense',[FilterDates::class, 'filterDateExpenses']);

// post

Route::middleware('auth:sanctum')->post('/addsupplier',[AddSupplierController::class, 'addSupplier']);
Route::middleware('auth:sanctum')->post('/deleteproduct',[CheckboxesController::class, 'deleteProduct']);
Route::middleware('auth:sanctum')->post('/deleteproductcateg',[CheckboxesController::class, 'deleteProductCategory']);
Route::middleware('auth:sanctum')->post('/deleteproductfailure',[CheckboxesController::class, 'deleteProductFailure']);
Route::middleware('auth:sanctum')->post('/deletesupplier',[CheckboxesController::class, 'deleteSupplier']);
Route::middleware('auth:sanctum')->post('/deletecustomer',[CheckboxesController::class, 'deleteCustomer']);
