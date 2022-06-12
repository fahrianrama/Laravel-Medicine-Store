<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\MedicineController;
use App\Http\Controllers\API\OrderController;

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
Route::get('users', [UserController::class, 'index']);
Route::post('users/store', [UserController::class, 'store']);
Route::get('users/show/{id}', [UserController::class, 'show']);
Route::post('users/update/{id}', [UserController::class, 'update']);
Route::post('users/destroy/{id}', [UserController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('medicine', [MedicineController::class, 'index']);
Route::post('medicine/store', [MedicineController::class, 'store']);
Route::get('medicine/show/{id}', [MedicineController::class, 'show']);
Route::post('medicine/update/{id}', [MedicineController::class, 'update']);
Route::post('medicine/destroy/{id}', [MedicineController::class, 'destroy']);

Route::get('orders', [OrderController::class, 'index']);
Route::post('orders/store', [OrderController::class, 'store']);
Route::get('orders/show/{id}', [OrderController::class, 'show']);
Route::post('orders/update/{id}', [OrderController::class, 'update']);
Route::post('orders/destroy/{id}', [OrderController::class, 'destroy']);

