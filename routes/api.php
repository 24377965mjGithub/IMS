<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AddSupplierController;
use App\Http\Controllers\Api\GetSuppliersController;
use App\Http\Controllers\Api\EditSuppliersController;

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

// put

Route::middleware('auth:sanctum')->post('/editsupplier',[EditSuppliersController::class, 'saveSupplier']);

// post

Route::middleware('auth:sanctum')->post('/addsupplier',[AddSupplierController::class, 'addSupplier']);