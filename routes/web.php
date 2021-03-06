<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CarController;

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
Route::get('/salons', [PagesController::class, 'salons'])->name('salons');

Route::resource('articles', ArticleController::class);

Route::group(['prefix' => 'catalog'], function () {
    Route::get('/', [CarController::class, 'index'])->name('products.index');
    Route::get('/{slug}', [CarController::class, 'category'])->name('category');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/{id}', [CarController::class, 'show'])->name('products.show');
});

require __DIR__.'/auth.php';

Route::get('/account', [PagesController::class, 'account'])->name('account')->middleware('auth');
