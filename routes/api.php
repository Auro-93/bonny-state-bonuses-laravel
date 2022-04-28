<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\BonusController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\AggregateController;


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

Route::get('/bonuses', [BonusController::class, 'index']);
Route::post('/bonuses/store', [BonusController::class, 'store']);
Route::get('/bonuses/{id}', [BonusController::class, 'show']);
Route::put('/bonuses/{id}/update', [BonusController::class, 'update']);
Route::delete('/bonuses/{id}/delete', [BonusController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories/store', [CategoryController::class, 'store']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::put('/categories/{id}/update', [CategoryController::class, 'update']);
Route::delete('/categories/{id}/delete', [CategoryController::class, 'destroy']);

Route::get('/categories/aggregate/max-saved-minutes', [AggregateController::class, 'max_saved_minutes']);
Route::get('/categories/aggregate/min-saved-minutes', [AggregateController::class, 'min_saved_minutes']);
Route::get('/categories/aggregate/total-saved-minutes', [AggregateController::class, 'total_saved_minutes']);



