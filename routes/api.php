<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MemberController;


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

     Route::get('/products', [ProductController::class, 'index'])->name('product.list');
     Route::post('/product/create', [ProductController::class, 'store']);
     Route::get('/product/edit/{id}', [ProductController::class, 'show'])->name('product.edit');
     Route::put('/product/edit/{id}',  [ProductController::class, 'update'])->name('product.update');
     Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

     Route::get('/members', [MemberController::class, 'index'])->name('member.list');
     Route::post('/member/create', [MemberController::class, 'store']);
     Route::get('/member/edit/{id}', [MemberController::class, 'show'])->name('member.edit');
     Route::put('/member/edit/{id}',  [MemberController::class, 'update'])->name('member.update');
     Route::delete('/member/delete/{id}', [MemberController::class, 'delete'])->name('member.delete');

     Route::get('berhasil', [AuthController::class, 'indexcuy']);
     Route::post('logout', [AuthController::class, 'logout']);
});