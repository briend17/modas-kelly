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

Route::get('/', 'App\Http\Controllers\HomeController@welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('dashboard');
    Route::resource('orders','App\Http\Controllers\OrderController');
    Route::resource('transactions', 'App\Http\Controllers\TransactionController');
    Route::POST('transaction', 'App\Http\Controllers\TransactionController@receivePay')->name('transaction.index');
});

require __DIR__.'/auth.php';
