<?php

use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FilesController::class, 'index'])->name('files');
Route::post('store', [FilesController::class, 'store'])->name('files-store');
Route::put('update/{id}', [FilesController::class, 'update'])->name('files-update');
Route::get('destroy/{id}', [FilesController::class, 'destroy'])->name('files-destroy');
