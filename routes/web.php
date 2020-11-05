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
    return view('welcome');
});


// home
Route::get('/home', App\Http\Livewire\Home\HomeJerseyPedia::class)->name('home');
Route::get('/Poduct', App\Http\Livewire\ProductIndex::class)->name('product');






// auth
Auth::routes();
