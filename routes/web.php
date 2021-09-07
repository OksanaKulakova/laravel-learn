<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticleController;

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

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');
Route::get('/sales', [PagesController::class, 'sales'])->name('sales');
Route::get('/financial', [PagesController::class, 'financial'])->name('financial');
Route::get('/clients', [PagesController::class, 'clients'])->name('clients');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article');
