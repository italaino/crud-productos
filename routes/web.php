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
    return view('auth.register');
});

Route::resource('productos', 'App\Http\Controllers\ProductoController');


Route::middleware(['auth:sanctum', 'verified'])->get('/producto', function () {
    return view('producto.index');
})->name('producto');
