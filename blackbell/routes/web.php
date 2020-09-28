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
    return view('home');
})->name('home');

Route::get('/karatebasico', function () {
    return view('karatebasico');
})->name('karatebasico');

Route::get('/karateintermedio', function () {
    return view('karateintermedio');
})->name('karateintermedio');

Route::get('/karateavanzado', function () {
    return view('karateavanzado');
})->name('karateavanzado');

Route::post('contacts', [App\Http\Controllers\FormController::class, 'guardar'])
    ->name('guardarFormulario');

 Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

