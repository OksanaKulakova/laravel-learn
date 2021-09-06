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

Route::get('/', function () {
    return view('pages/homepage');
});

Route::get('/about', function () {
    $title = 'О компании';

    return view('pages/about', compact('title'));
});

Route::get('/contacts', function () {
    $title = 'Контактная информация';

    return view('pages/contacts', compact('title'));
});

Route::get('/sales', function () {
    $title = 'Условия продаж';

    return view('pages/sales', compact('title'));
});

Route::get('/financial', function () {
    $title = 'Финансовый отдел';

    return view('pages/financial', compact('title'));
});

Route::get('/clients', function () {
    $title = 'Для клиентов';

    return view('pages/clients', compact('title'));
});
