<?php

use App\Http\Controllers\ProductTestController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\UserProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');;
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');

//Route::get('products/{id}',[ProductTestController::class, 'show']);
//Route::get('products',[ProductTestController::class, 'index']);

Route::resource('products', App\Http\Controllers\ProductController::class);

//Route::get('users/{id}/products',[UserProductController::class, 'index'])->name('users.products.index');
Route::resource('users.products', UserProductController::class)->only(['index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::resource('products', App\Http\Controllers\ProductController::class)->only(['update', 'store', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::resource('products', App\Http\Controllers\ProductController::class)->only(['index']);