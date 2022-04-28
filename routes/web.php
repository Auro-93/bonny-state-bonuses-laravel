<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [OverviewController::class, 'index'])->name("overview.index");

Route::get('/bonuses', [BonusController::class, 'index'])->name("bonuses.index");
Route::get('/bonuses/create', [BonusController::class, 'create'])->name("bonuses.create");
Route::post('/bonuses/store', [BonusController::class, 'store'])->name("bonuses.store");
Route::get('/bonuses/{id}/edit', [BonusController::class, 'edit'])->name("bonuses.edit");
Route::put('/bonuses/{id}/update', [BonusController::class, 'update'])->name("bonuses.update");
Route::delete('/bonuses/{id}/delete', [BonusController::class, 'destroy'])->name("bonuses.delete");

Route::get('/categories', [CategoryController::class, 'index'])->name("categories.index");
Route::get('/categories/create', [CategoryController::class, 'create'])->name("categories.create");
Route::post('/categories/store', [CategoryController::class, 'store'])->name("categories.store");
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name("categories.edit");
Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->name("categories.update");
Route::delete('/categories/{id}/delete', [CategoryController::class, 'destroy'])->name("categories.delete");


