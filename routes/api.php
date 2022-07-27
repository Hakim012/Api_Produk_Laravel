<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('produk', [ProdukController::class ,'index']);
Route::post('produk/store', [ProdukController::class ,'store']);
Route::get('produk/show/{id}', [ProdukController::class ,'show']);
Route::post('produk/update/{id}', [ProdukController::class ,'update']);
Route::get('produk/destroy/{id}', [ProdukController::class ,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
