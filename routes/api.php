<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('brands')
    ->as('brand.')
    ->group(static function (): void {
        Route::get('/list', [BrandController::class, 'index'])
            ->name('index');
        Route::get('{id}/show', [BrandController::class, 'show'])
            ->where('id', '\d+')
            ->name('show');
    });
Route::prefix('products')
    ->as('product.')
    ->group(static function (): void {
        Route::get('/list', [ProductController::class, 'index'])
            ->name('index');
        Route::get('{id}/show', [ProductController::class, 'show'])
            ->where('id', '\d+')
            ->name('show');
    });
Route::prefix('categories')
    ->as('category.')
    ->group(static function (): void {
        Route::get('/list', [CategoryController::class, 'index'])
            ->name('index');
        Route::get('{id}/show', [CategoryController::class, 'show'])
            ->where('id', '\d+')
            ->name('show');
    });
Route::prefix('countries')
    ->as('country.')
    ->group(static function (): void {
        Route::get('/list', [CountryController::class, 'index'])
            ->name('index');
        Route::get('{id}/show', [CountryController::class, 'show'])
            ->where('id', '\d+')
            ->name('show');
    });
