<?php

use Illuminate\Support\Facades\Route;
use App\Models\Requests;
use Illuminate\Http\Request;

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

Route::get('/', [App\Http\Controllers\FormController::class, 'index']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::post('/checkRequest', [App\Http\Controllers\AdminController::class, 'checkRequest'])->name('admin');
Route::get('/form', [App\Http\Controllers\FormController::class, 'index'])->name('form');
Route::post('/form', [App\Http\Controllers\FormController::class, 'request'])->name('form');
Route::get('/send', [App\Http\Controllers\FormController::class, 'send'])->name('send');
