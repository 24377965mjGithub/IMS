<?php

namespace App\Http\Controllers;

use App\Http\Livewire\CustomerTypes;
use App\Models\Customers;
use App\Models\CustomerType;
use App\Models\ProductCategory;
use App\Models\ProductFailure;
use App\Models\ProductIns;
use App\Models\ProductOuts;
use App\Models\Products;
use App\Models\Role;
use App\Models\Suppliers;
use App\Models\User;
use Illuminate\Http\Request;
class ExportExcelController extends Controller
{
    public function export() {

        require 'PhpXlsxGenerator/PhpXlsxGenerator.php';

        $products = Products::all();
        $category = ProductCategory::all();
        $supplier = Suppliers::all();

        $excelData[] = array(
            'Product Name',
            'Bar Code',
            'Description',
            'Supplier',
            'Price',
            'Cost',
            'Category',
            'Current Quantity',
            'Unit',
            'Status'
        );

        foreach ($products as $key => $value) {
            $lineData = array(
                $value['productName'],
                  $value['productBarCode'],
                  $value['productDescription'],
                  $supplier->where('id', $value['suppliersId'])->value('suppliersName'),
                  "P ".$value['productPrice'],
                  "P ".$value['productCost'],
                  $category->where('id', $value['productCategoryId'])->value('categoryName'),
                  $value['productQuantity'],
                  $value['productUnit'],
                  $value['productStatus']
            );
            $excelData[] = $lineData;
        }

        $xlsx = \CodexWorld\PhpXlsxGenerator::fromArray( $excelData );
        $xlsx->downloadAs("product_export_" . date('Y-m-d') . ".xlsx");


    }

    // export product ins

    public function exportProductIns() {
        require 'PhpXlsxGenerator/PhpXlsxGenerator.php';

        $products = Products::all();
        $category = ProductCategory::all();
        $supplier = Suppliers::all();
        $productIns = ProductIns::all();
        $user = User::all();
        $role = Role::all();

        $excelData[] = array(
            'Product Name',
            'Bar Code',
            'Description',
            'Supplier',
            'Price',
            'Cost',
            'Category',
            'Quantity',
            'Unit',
            'Recorded By',
            'Role',
            'Date'
        );

        foreach ($productIns as $key => $value) {
            $lineData = array(
                $products->where('id', $value['productId'])->value('productName'),
                $products->where('id', $value['productId'])->value('productBarCode'),
                $products->where('id', $value['productId'])->value('productDescription'),
                $supplier->where('id', $value['suppliersId'])->value('suppliersName'),
                "P ".$products->where('id', $value['productId'])->value('productPrice'),
                "P ".$products->where('id', $value['productId'])->value('productCost'),
                $category->where('id', $value['productCategoryId'])->value('categoryName'),
                $value['quantity'],
                $products->where('id', $value['productId'])->value('productUnit'),
                $user->where('id', $value['userId'])->value('firstname')." ".
                $user->where('id', $value['userId'])->value('middlename')." ".
                $user->where('id', $value['userId'])->value('lastname'),
                $role->where('id', $value['userRoleId'])->value('roleName'),
                $value['created_at']->format('D - M d, Y'),
            );
            $excelData[] = $lineData;
        }

        $xlsx = \CodexWorld\PhpXlsxGenerator::fromArray( $excelData );
        $xlsx->downloadAs("product_ins_export_" . date('Y-m-d') . ".xlsx");
    }

    public function exportProductOuts() {
        require 'PhpXlsxGenerator/PhpXlsxGenerator.php';

        $products = Products::all();
        $category = ProductCategory::all();
        $supplier = Suppliers::all();
        $productOuts = ProductOuts::all();
        $user = User::all();
        $role = Role::all();
        $customers = Customers::all();
        $customersType = CustomerType::all();

        $excelData[] = array(
            'Product Name',
            'Bar Code',
            'Description',
            'Supplier',
            'Price',
            'Cost',
            'Category',
            'Quantity',
            'Unit',
            'Total',
            'Customer Name',
            'Customer Type',
            'Recorded By',
            'Role',
            'Date'
        );

        foreach ($productOuts as $key => $value) {

            $income = $value['quantity'] * $products->where('id', $value['productId'])->value('productPrice');
            $discount = $customersType->where('id', $value['customersTypeId'])->value('discountPercentage');
            $discounted = $income * floatval(".".$discount);
            $total = $income - $discounted;

            // discount if

            if (!$customersType->where('id', $value['customersTypeId'])->value('isDiscounted')) {
                $customerType = $customersType->where('id', $value['customersTypeId'])->value('customersType');
            } else {
                $customerType = $customersType->where('id', $value['customersTypeId'])->value('customersType')." (".$customersType->where('id', $value['customersTypeId'])->value('discountPercentage')."% discount)";
            }

            $lineData = array(
                $products->where('id', $value['productId'])->value('productName'),
                $products->where('id', $value['productId'])->value('productBarCode'),
                $products->where('id', $value['productId'])->value('productDescription'),
                $supplier->where('id', $value['suppliersId'])->value('suppliersName'),
                "P ".$products->where('id', $value['productId'])->value('productPrice'),
                "P ".$products->where('id', $value['productId'])->value('productCost'),
                $category->where('id', $value['productCategoryId'])->value('categoryName'),
                $value['quantity'],
                $products->where('id', $value['productId'])->value('productUnit'),
                "P ".$total,
                $customers->where('id', $value['customersId'])->value('customersName'),
                $customerType,
                $user->where('id', $value['userId'])->value('firstname')." ".
                $user->where('id', $value['userId'])->value('middlename')." ".
                $user->where('id', $value['userId'])->value('lastname'),
                $role->where('id', $value['userRoleId'])->value('roleName'),
                $value['created_at']->format('D - M d, Y'),
            );
            $excelData[] = $lineData;
        }

        $xlsx = \CodexWorld\PhpXlsxGenerator::fromArray( $excelData );
        $xlsx->downloadAs("product_outs_export_" . date('Y-m-d') . ".xlsx");
    }

    public function exportFailure() {
        require 'PhpXlsxGenerator/PhpXlsxGenerator.php';

        $products = Products::all();
        $category = ProductCategory::all();
        $supplier = Suppliers::all();
        $productOuts = ProductOuts::all();
        $user = User::all();
        $role = Role::all();
        $productFailure = ProductFailure::all();

        $excelData[] = array(
            'Product Name',
            'Bar Code',
            'Description',
            'Supplier',
            'Price',
            'Cost',
            'Category',
            'Quantity',
            'Unit',
            'Reason',
            'Total',
            'Recorded By',
            'Role',
            'Date'
        );

        foreach ($productFailure as $key => $value) {

            $total = $value['quantity'] * $products->where('id', $value['productId'])->value('productPrice');

            $lineData = array(
                $products->where('id', $value['productId'])->value('productName'),
                $products->where('id', $value['productId'])->value('productBarCode'),
                $products->where('id', $value['productId'])->value('productDescription'),
                $supplier->where('id', $value['suppliersId'])->value('suppliersName'),
                "P ".$products->where('id', $value['productId'])->value('productPrice'),
                "P ".$products->where('id', $value['productId'])->value('productCost'),
                $category->where('id', $value['productCategoryId'])->value('categoryName'),
                $value['quantity'],
                $products->where('id', $value['productId'])->value('productUnit'),
                $value['reason'],
                "P ".$total,
                $user->where('id', $value['userId'])->value('firstname')." ".
                $user->where('id', $value['userId'])->value('middlename')." ".
                $user->where('id', $value['userId'])->value('lastname'),
                $role->where('id', $user->where('id', $value['userId'])->value('role'))->value('roleName'),
                $value['created_at']->format('D - M d, Y'),
            );
            $excelData[] = $lineData;
        }

        $xlsx = \CodexWorld\PhpXlsxGenerator::fromArray( $excelData );
        $xlsx->downloadAs("product_failures_export_" . date('Y-m-d') . ".xlsx");
    }

    public function exportSuppliers() {
        require 'PhpXlsxGenerator/PhpXlsxGenerator.php';

        $suppliers = Suppliers::all();

        $excelData[] = array(
            'Supplier',
            'Supplier Phone Number',
            'Supplier Email'
        );

        foreach ($suppliers as $key => $value) {

            $lineData = array(
                $value['suppliersName'],
                $value['suppliersPhoneNumber'],
                $value['suppliersEmail'],
            );
            $excelData[] = $lineData;
        }

        $xlsx = \CodexWorld\PhpXlsxGenerator::fromArray( $excelData );
        $xlsx->downloadAs("supplier_export_" . date('Y-m-d') . ".xlsx");
    }

}
