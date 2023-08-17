<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\AddSupplierController;
use App\Http\Controllers\SaveEditSupplier;
use App\Http\Controllers\DeleteSupplier;
use App\Http\Controllers\AddProductCategory;
use App\Http\Controllers\SaveProductCategory;
use App\Http\Controllers\DeleteProductCategory;
use App\Http\Controllers\ProductUploadController;
use App\Http\Controllers\SaveEditProductController;
use App\Http\Controllers\SaveProductImageController;
use App\Http\Controllers\DeleteProductController;
use App\Http\Controllers\ProductInsController;
use App\Http\Controllers\CustomerTypesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// get requests
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/products', [ProductsController::class, 'products'])->middleware(['auth', 'verified']);
Route::get('/productcategories', [ProductCategoryController::class, 'productCategory'])->middleware(['auth', 'verified']);
Route::get('/suppliers', [SuppliersController::class, 'suppliers'])->middleware(['auth', 'verified']);
Route::get('/productins', [ProductInsController::class, 'productIns'])->middleware(['auth', 'verified']);
Route::get('/customertypes', [CustomerTypesController::class, 'customerTypes'])->middleware(['auth', 'verified']);

Route::get('/deletesupplier/{id}', [DeleteSupplier::class, 'deleteSupplier'])->middleware(['auth', 'verified']);
Route::get('/deleteproductcategory/{id}', [DeleteProductCategory::class, 'deleteProductCategory'])->middleware(['auth', 'verified']);
Route::get('/deleteproduct/{id}', [DeleteProductController::class, 'deleteProduct'])->middleware(['auth', 'verified']);

// posts requests
Route::post('/addsupplier', [AddSupplierController::class, 'addSupplier'])->middleware(['auth', 'verified']);
Route::post('/savesupplier/{id}', [SaveEditSupplier::class, 'saveSupplier'])->middleware(['auth', 'verified']);
Route::post('/addproductcategory', [AddProductCategory::class, 'addProductCategory'])->middleware(['auth', 'verified']);
Route::post('/saveproductcategory/{id}', [SaveProductCategory::class, 'saveProductCategory'])->middleware(['auth', 'verified']);
Route::post('/saveproduct', [ProductUploadController::class, 'productUpload'])->middleware(['auth', 'verified']);
Route::post('/saveeditproduct/{id}', [SaveEditProductController::class, 'saveEditProduct'])->middleware(['auth', 'verified']);
Route::post('/saveeditproductimg/{id}', [SaveProductImageController::class, 'saveProductImage'])->middleware(['auth', 'verified']);

// tests