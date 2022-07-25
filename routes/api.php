<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AskFormatController;
use App\Http\Controllers\AskCategoryController;
use App\Models\Activity;
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

// Route::resource('products', ProductController::class);

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);

Route::get('/asks/', [AskController::class, 'index']);
Route::get('/asks/{id}', [AskController::class, 'show']);
Route::get('/asks/search/{title}', [AskController::class, 'search']);

Route::resource('activities', ActivityController::class)->except(['store', 'update', 'destroy']);
Route::resource('salaries', SalaryController::class)->except(['store', 'update', 'destroy']);
Route::resource('ask-categories', AskCategoryController::class)->except(['store', 'update', 'destroy']);
Route::resource('ask-formats', AskFormatController::class)->except(['store', 'update', 'destroy']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/asks/', [AskController::class, 'store']);
    Route::put('/asks/{id}', [AskController::class, 'update']);
    Route::delete('/asks/{id}', [AskController::class, 'destroy']);

    Route::resource('activities', ActivityController::class)->except(['index', 'show']);
    Route::resource('salaries', SalaryController::class)->except(['index', 'show']);
    Route::resource('ask-categories', AskCategoryController::class)->except(['index', 'show']);
    Route::resource('ask-formats', AskFormatController::class)->except(['index', 'show']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
