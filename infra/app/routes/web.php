<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageGeneratorController;

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
Route::get('/', ImageGeneratorController::class);
Route::get('/api/picsum', [ImageGeneratorController::class,'getImageJSON']);
Route::post('store-form', [ImageGeneratorController::class, 'store']);
Route::get('/admin/{token}', [ImageGeneratorController::class, 'admin']);
Route::get('/admin/{id}/reset', [ImageGeneratorController::class, 'reset']);
