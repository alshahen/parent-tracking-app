<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Baby\CreateBabyController;
use App\Http\Controllers\Api\Baby\DeleteBabyController;
use App\Http\Controllers\Api\Baby\IndexBabyController;
use App\Http\Controllers\Api\Baby\ShowBabyController;
use App\Http\Controllers\Api\Baby\UpdateBabyController;
use App\Http\Controllers\Api\Partner\CreatePartnerController;
use App\Http\Controllers\Api\Partner\IndexPartnerController;
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

Route::prefix('auth')->group(function(){
    Route::post('register', RegisterController::class);
    Route::post('login', LoginController::class);
});

Route::middleware('auth:sanctum')->group(function (){

    // Babies Route
    Route::prefix('babies')->group(function (){
        Route::get('/', IndexBabyController::class);
        Route::post('/', CreateBabyController::class);
        Route::patch('/{id}', UpdateBabyController::class);
        Route::delete('/{id}', DeleteBabyController::class);
        Route::get('/{id}', ShowBabyController::class);
    });

    // Partners Route
    Route::prefix('partners')->group(function (){
        Route::get('/', IndexPartnerController::class);
        Route::post('/', CreatePartnerController::class);
    });

});


