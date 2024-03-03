<?php

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

Route::controller(\App\Http\Controllers\LanguageController::class)->prefix('languages')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store')->name('language_store');
});

Route::controller(\App\Http\Controllers\LocalesController::class)->prefix('locales')->group(function (){
    Route::get('/','index');
    Route::post('/','store')->name('locale_store');
});

Route::controller(\App\Http\Controllers\TranslationsController::class)->prefix('translations')->group(function (){
    Route::post('/','store')->name('translation_store');
});

Route::controller(\App\Http\Controllers\ExportsController::class)->prefix('exports')->group(function (){
    Route::get('','available');
    Route::get('download/{name}','download')->name('download');
    Route::post('{type}','export')->name('export');
});
