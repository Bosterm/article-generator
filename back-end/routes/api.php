<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EssayController;
use App\Http\Controllers\FootnoteController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix'=>'essay'], function () {
    Route::get('/', [EssayController::class, 'index']);
    Route::get('/{id}', [EssayController::class, 'show']);
    Route::post('/', [EssayController::class, 'store']);
    Route::put('/{id}', [EssayController::class, 'update']);
    Route::delete('/{id}', [EssayController::class, 'destroy']);
});

Route::group(['prefix'=>'footnote'], function () {
    Route::get('/', [FootnoteController::class, 'index']);
    Route::get('/{id}', [FootnoteController::class, 'show']);
    Route::post('/', [FootnoteController::class, 'store']);
    Route::put('/{id}', [FootnoteController::class, 'update']);
    Route::delete('/{id}', [FootnoteController::class, 'destroy']);
});