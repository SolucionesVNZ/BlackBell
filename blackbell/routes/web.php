<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\KaratebasicoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\ShoppingCart;
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

// Route para Cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'mostrarCarrito'])
    ->name('cart');

/* Route para Orden */
Route::get('/finalizar-compra', [App\Http\Controllers\OrdenController::class, 'mostrarCarrito'])
    ->name('finalizar-compra');

/* Route para la disciplina KARATE */
Route::get('/karate-basico', function () {
    return view('karate/karatebasico');
})->name('karatebasico');

Route::get('/karate-intermedio', function () {
    return view('karate/karateintermedio');
})->name('karateintermedio');

Route::get('/karate-avanzado', function () {
    return view('karate/karateavanzado');
})->name('karateavanzado');

/* Route para la disciplina MUAY THAI */
Route::get('/muaythai-basico', function () {
    return view('muaythai/muaythaibasico');
})->name('muaythai-basico');

Route::get('/muaythai-intermedio', function () {
    return view('muaythai/muaythaiintermedio');
})->name('muaythai-intermedio');

Route::get('/muaythai-avanzado', function () {
    return view('muaythai/muaythaiavanzado');
})->name('muaythai-avanzado');

Route::post('contacts', [App\Http\Controllers\FormController::class, 'guardar'])
    ->name('guardarFormulario');

/* Routes de Agregar carrito Karate basico */
Route::post('karatebasico', [App\Http\Controllers\KaratebasicoController::class, 'agregar'])
    ->name('agregarCarritoKarateBasico');
/* Routes de Quitar Producto Karate basico */
Route::get('cart/{idproducto}', [App\Http\Controllers\KaratebasicoController::class, 'quitarproducto'])
    ->name('quitarProductoKarateBasico');
/* Routes de Actualizar carrito Karate basico */
Route::post('cart', [App\Http\Controllers\KaratebasicoController::class, 'updateCart'])
    ->name('actualizarCarritoKarateBasico');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
// Password reset link request routes...
Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');


/*
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
*/
