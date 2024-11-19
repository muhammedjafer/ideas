<?php

use App\Http\Controllers\V1\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//products api
Route::post('add-product', [ProductController::class, 'create']);
