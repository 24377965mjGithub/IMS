<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class GetModels extends Controller
{
    public function getProducts(){
        return response()->json(Products::all());
    }
}
