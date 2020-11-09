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

Route::redirect('/', '/home', 301);


// home
Route::get('/home', App\Http\Livewire\Home\HomeJerseyPedia::class)->name('home');
Route::get('/Product', App\Http\Livewire\ProductIndex::class)->name('product');
Route::get('/Product/liga/{id}', App\Http\Livewire\ProductLiga::class)->name('product.liga');
Route::get('/Product/detail/{id}', App\Http\Livewire\ProductDetail::class)->name('product.detail');






// auth
Auth::routes();
