<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DetailTransactionController;


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

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::group(['middleware' => ['auth:api']], function () {

     // Route::get('/products', [ProductController::class, 'index'])->name('product.list');
     // Route::post('/product/create', [ProductController::class, 'store']);
     // Route::get('/product/edit/{id}', [ProductController::class, 'show'])->name('product.edit');
     // Route::put('/product/edit/{id}',  [ProductController::class, 'update'])->name('product.update');
     // Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

     Route::get('members', [MemberController::class, 'index']);
     Route::get('members/{id}', [MemberController::class, 'show']);
     Route::post('members', [MemberController::class, 'store']);
     Route::put('members/{id}', [MemberController::class, 'update']);
     Route::delete('members/{id}', [MemberController::class, 'delete']);

     
     Route::get('products', [ProductController::class, 'index']);
     Route::get('products/{id}', [ProductController::class, 'show']);
     Route::post('products', [ProductController::class, 'store']);
     Route::put('products/{id}', [ProductController::class, 'update']);
     Route::delete('products/{id}', [ProductController::class, 'delete']);

     Route::get('transactions', [TransactionController::class, 'index']);
     Route::get('transactions/{id}', [TransactionController::class, 'show']);
     Route::post('transactions', [TransactionController::class, 'store']);
     Route::put('transactions/{id}', [TransactionController::class, 'update']);
     Route::delete('transactions/{id}', [TransactionController::class, 'delete']);

     Route::get('detail-transactions', [DetailTransactionController::class, 'index']);
     Route::get('detail-transactions/{id}', [DetailTransactionController::class, 'show']);
     Route::get('transactions/detail/{id}', [DetailTransactionController::class, 'showByTransactionId']);
     Route::post('detail-transactions', [DetailTransactionController::class, 'store']);
     Route::put('detail-transactions/{id}', [DetailTransactionController::class, 'update']);
     Route::delete('detail-transactions/{id}', [DetailTransactionController::class, 'delete']);

     Route::get('berhasil', [AuthController::class, 'indexcuy']);
     Route::post('logout', [AuthController::class, 'logout']);
});