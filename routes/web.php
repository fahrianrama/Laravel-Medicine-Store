<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
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
    // return route to landing
    return redirect('/landing');
});
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/login/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::post('/login/register', [LoginController::class, 'register'])->name('login.register');
Route::post('/login/registeraction', [LoginController::class, 'registeraction'])->name('login.registeraction');
Route::get('/landing', function () {
    Route::resource('home', 'true');
    return view('landing');
})->name('landing');

Route::get('/medicine', [MedicineController::class ,'index'])->name('medicine');
Route::get('/medicine/create', [MedicineController::class ,'create'])->name('medicine.create');
Route::post('/medicine/store', [MedicineController::class ,'store'])->name('medicine.store');
Route::get('/medicine/edit/{id}', [MedicineController::class ,'edit'])->name('medicine.edit');
Route::post('/medicine/update', [MedicineController::class ,'update'])->name('medicine.update');
Route::get('/medicine/delete/{id}', [MedicineController::class ,'delete'])->name('medicine.drop');
Route::get('/medicine/show/{id}', [MedicineController::class ,'show'])->name('medicine.show');
Route::post('/medicine/search', [MedicineController::class ,'search'])->name('medicine.search');

// show profile
Route::get('/profile', [UserController::class ,'profile'])->name('profile');
Route::get('/myorder', [UserController::class ,'order'])->name('myorder');
Route::get('/myorder/success', [UserController::class ,'success'])->name('myorder.success');
Route::get('/orders/success', [OrderController::class ,'success'])->name('orders.success');

// checkout
Route::get('/checkout/{id}', [UserController::class ,'checkout'])->name('checkout');
Route::post('/cart', [UserController::class ,'addcart'])->name('addcart');
// cancel order
Route::get('/cancel/{id}', [UserController::class ,'cancelOrder'])->name('cancelorder');

Route::get('/orders', [OrderController::class ,'index'])->name('orders');
Route::get('/confirm/{id}', [OrderController::class ,'confirm'])->name('order.confirm');