<?php
namespace App\Http\Controllers;
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

Route::post('/users/signup', [UserController::class, 'register']);
Route::post('/users/signin', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('/shopping', [ShopController::class, 'shopping']);
    Route::get('/shopping', [ShopController::class, 'getShoppings']);
    Route::get('/shopping/{id}', [ShopController::class, 'getShoppings']);
    Route::put('/shopping/{id}', [ShopController::class, 'updateShopping']);
    Route::delete('/shopping/{id}', [ShopController::class, 'deleteShopping']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/users', [UserController::class, 'getUsers']);
});
