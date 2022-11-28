<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductAPIController;
use App\Http\Controllers\LoginAPIController;

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

// Route::get('/products/list',[ProductController::class,'APIList']);
// Route::post('/products/list',[ProductController::class,'APIPost']);

//API Auth
Route::get('/products/list',[ProductAPIController::class,'list'])->middleware('APIAuth');
Route::post('/products/list',[ProductAPIController::class,'add']);

Route::post('/login',[LoginAPIController::class,'login']); 
Route::post('/logout',[LoginAPIController::class,'logout']); 