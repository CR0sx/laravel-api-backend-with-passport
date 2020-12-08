<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CEOController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//Route::apiResource('ceo', CEOController::class)->middleware('auth:api');

Route::get('showall', [CEOController::class, 'showAll'])->middleware('auth:api');
Route::get('ceo/{$name}', [CEOController::class, 'getCeo'])->middleware('auth:api');
Route::get('ceo/get/{$id}', [CEOController::class, 'getOneData'])->middleware('auth:api');
Route::post('store', [CEOController::class, 'store'])->middleware('auth:api');
Route::patch('update/{$ceo}', [CEOController::class, 'updateCEO'])->middleware('auth:api');
Route::delete('delete/{$ceo}', [CEOController::class, 'delete'])->middleware('auth:api');


