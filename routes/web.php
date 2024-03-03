<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('', [\App\Http\Controllers\TranslationsController::class, 'index'])->name('translations');
Route::get('locales', [\App\Http\Controllers\LocalesController::class, 'index'])->name('locales');
Route::get('languages', [\App\Http\Controllers\LanguageController::class, 'index'])->name('languages');
Route::get('exports', [\App\Http\Controllers\ExportsController::class, 'index'])->name('exports');

