<?php

use App\Http\Controllers\AddCustomerController;
use App\Http\Controllers\AddDiscountController;
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
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DeleteCustomerController;
use App\Http\Controllers\ProductFailureController;
use App\Http\Controllers\ProductOutController;
use App\Http\Controllers\SaveEditCustomer;
use App\Http\Controllers\SaveProductFailureController;
use App\Http\Controllers\SaveProductOutController;
use App\Http\Controllers\StaffRoleController;
use App\Http\Controllers\SaveRoleController;
use App\Http\Controllers\SaveEditRoleController;
use App\Http\Controllers\DeleteRoleController;
use App\Http\Controllers\DiscountedController;
use App\Http\Controllers\RemoveDiscountController;
use App\Http\Controllers\SaveEditDiscountController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SaveStaffController;
use App\Http\Controllers\SaveStaffNameController;
use App\Http\Controllers\SaveStaffEmailController;
use App\Http\Controllers\SaveStaffPhoneNumberController;
use App\Http\Controllers\SaveStaffPasswordController;
use App\Http\Controllers\TerminateStaffController;
use App\Http\Controllers\FilterDates;
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
Route::get('/customers', [CustomersController::class, 'customers'])->middleware(['auth', 'verified']);
Route::get('/productouts', [ProductOutController::class, 'productOuts'])->middleware(['auth', 'verified']);
Route::get('/productfailures', [ProductFailureController::class, 'productFailure'])->middleware(['auth', 'verified']);
Route::get('/staffroles', [StaffRoleController::class, 'staffRole'])->middleware(['auth', 'verified']);
Route::get('/staffs', [StaffController::class, 'staff'])->middleware(['auth', 'verified']);
Route::get('/discounted', [DiscountedController::class, 'discounted'])->middleware(['auth', 'verified']);
Route::get('/filter-sales', [FilterDates::class, 'filterDateSales'])->middleware(['auth', 'verified']);

Route::get('/deletesupplier/{id}', [DeleteSupplier::class, 'deleteSupplier'])->middleware(['auth', 'verified']);
Route::get('/deleteproductcategory/{id}', [DeleteProductCategory::class, 'deleteProductCategory'])->middleware(['auth', 'verified']);
Route::get('/deleteproduct/{id}', [DeleteProductController::class, 'deleteProduct'])->middleware(['auth', 'verified']);
Route::get('/deletecustomer/{id}', [DeleteCustomerController::class, 'deleteCustomer'])->middleware(['auth', 'verified']);
Route::get('/deleterole/{id}', [DeleteRoleController::class, 'deleteRole'])->middleware(['auth', 'verified']);
Route::get('/terminatestaff/{id}', [TerminateStaffController::class, 'terminateStaff'])->middleware(['auth', 'verified']);
Route::get('/removediscount/{id}', [RemoveDiscountController::class, 'removeDiscount'])->middleware(['auth', 'verified']);

// posts requests
Route::post('/addsupplier', [AddSupplierController::class, 'addSupplier'])->middleware(['auth', 'verified']);
Route::post('/savesupplier/{id}', [SaveEditSupplier::class, 'saveSupplier'])->middleware(['auth', 'verified']);
Route::post('/addproductcategory', [AddProductCategory::class, 'addProductCategory'])->middleware(['auth', 'verified']);
Route::post('/saveproductcategory/{id}', [SaveProductCategory::class, 'saveProductCategory'])->middleware(['auth', 'verified']);
Route::post('/saveproduct', [ProductUploadController::class, 'productUpload'])->middleware(['auth', 'verified']);
Route::post('/saveeditproduct/{id}', [SaveEditProductController::class, 'saveEditProduct'])->middleware(['auth', 'verified']);
Route::post('/saveeditproductimg/{id}', [SaveProductImageController::class, 'saveProductImage'])->middleware(['auth', 'verified']);
Route::post('/addcustomer', [AddCustomerController::class, 'addCustomer'])->middleware(['auth', 'verified']);
Route::post('/saveeditcustomer/{id}', [SaveEditCustomer::class, 'saveEditCustomer'])->middleware(['auth', 'verified']);
Route::post('/saveproductout/{productCategoryId}/{suppliersId}/{productId}', [SaveProductOutController::class, 'saveProductOut'])->middleware(['auth', 'verified']);
Route::post('/saveproductfailure/{productCategoryId}/{suppliersId}/{productId}', [SaveProductFailureController::class, 'saveProductFailure'])->middleware(['auth', 'verified']);
Route::post('/saverole', [SaveRoleController::class, 'saveRole'])->middleware(['auth', 'verified']);
Route::post('/saveeditrole/{id}', [SaveEditRoleController::class, 'saveEditRole'])->middleware(['auth', 'verified']);
Route::post('/savestaff', [SaveStaffController::class, 'saveStaff'])->middleware(['auth', 'verified']);
Route::post('/savestaffname/{id}', [SaveStaffNameController::class, 'saveStaffName'])->middleware(['auth', 'verified']);
Route::post('/savestaffemail/{id}', [SaveStaffEmailController::class, 'saveStaffEmail'])->middleware(['auth', 'verified']);
Route::post('/savestaffphone/{id}', [SaveStaffPhoneNumberController::class, 'saveStaffPhoneNumber'])->middleware(['auth', 'verified']);
Route::post('/savestaffpassword/{id}', [SaveStaffPasswordController::class, 'saveStaffPassword'])->middleware(['auth', 'verified']);
Route::post('/adddiscount', [AddDiscountController::class, 'addDiscount'])->middleware(['auth', 'verified']);
Route::post('/saveeditdiscount/{id}', [SaveEditDiscountController::class, 'saveEditDiscount'])->middleware(['auth', 'verified']);

// tests
