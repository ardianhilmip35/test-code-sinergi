<?php

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



Auth::routes();

Route::get('/', [App\Http\Controllers\DataController::class, 'index'])->name('home');
Route::post('/', [App\Http\Controllers\DataController::class, 'store'])->name('tambahdata');
Route::get('/hapusdata/{id}', [App\Http\Controllers\DataController::class, 'destroy'])->name('hapusdata');
Route::match(['get', 'post'], '/edit/{id}', [App\Http\Controllers\DataController::class, 'update']);
