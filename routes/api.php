<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('brands')
    ->as('brand.')
    ->middleware('auth_api')
    ->group(static function (): void {
        Route::get('/list', [BrandController::class, 'index'])
            ->name('index');
        Route::get('{id}/show', [BrandController::class, 'show'])
            ->where('id', '\d+')
            ->name('show');
    });
Route::prefix('products')
    ->as('product.')
    ->middleware('auth_api')
    ->group(static function (): void {
        Route::get('/list', [ProductController::class, 'index'])
            ->name('index');
        Route::get('{id}/show', [ProductController::class, 'show'])
            ->where('id', '\d+')
            ->name('show');
    });
Route::prefix('categories')
    ->as('category.')
    ->middleware('auth_api')
    ->group(static function (): void {
        Route::get('/list', [CategoryController::class, 'index'])
            ->name('index');
        Route::get('{id}/show', [CategoryController::class, 'show'])
            ->where('id', '\d+')
            ->name('show');
    });
Route::prefix('countries')
    ->as('country.')
    ->middleware('auth_api')
    ->group(static function (): void {
        Route::get('/list', [CountryController::class, 'index'])
            ->name('index');
        Route::get('{id}/show', [CountryController::class, 'show'])
            ->where('id', '\d+')
            ->name('show');
    });
