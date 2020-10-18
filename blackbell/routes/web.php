<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\KaratebasicoController;
use App\Http\Controllers\OrdenController;
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

// Route para Home
Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('contacts', [App\Http\Controllers\FormController::class, 'guardar'])
    ->name('guardarFormulario');

// Route para Cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'mostrarCarrito'])
    ->name('cart');

/* Routes de Quitar Producto de Cart */
Route::get('cart/{idproducto}', [App\Http\Controllers\KaratebasicoController::class, 'quitarproducto'])
    ->name('quitarProductoKarateBasico');

/* Routes de Actualizar carrito de Cart */
Route::post('cart', [App\Http\Controllers\CartController::class, 'updateCart'])
    ->name('actualizarCarritoKarateBasico');

/* Route para Orden */
Route::get('/finalizar-compra', [App\Http\Controllers\OrdenController::class, 'mostrarCarrito'])
    ->name('finalizar-compra');

Route::post('/finalizar-compra', [App\Http\Controllers\OrdenController::class, 'crearOrden'])
    ->name('crearOrden');

Route::get('provincias/{id}', [App\Http\Controllers\OrdenController::class, 'getProvincias']);
Route::get('distritos/{id}', [App\Http\Controllers\OrdenController::class, 'getDistritos']);



/* Route para la Disciplina KARATE */
Route::get('/karate-basico', function () {
    return view('karate/karatebasico');
})->name('karatebasico');

Route::get('/karate-intermedio', function () {
    return view('karate/karateintermedio');
})->name('karateintermedio');

Route::get('/karate-avanzado', function () {
    return view('karate/karateavanzado');
})->name('karateavanzado');

/* Route para la Disciplina MUAY THAI */
Route::get('/muaythai-basico', function () {
    return view('muaythai/muaythaibasico');
})->name('muaythai-basico');

Route::get('/muaythai-intermedio', function () {
    return view('muaythai/muaythaiintermedio');
})->name('muaythai-intermedio');

Route::get('/muaythai-avanzado', function () {
    return view('muaythai/muaythaiavanzado');
})->name('muaythai-avanzado');

/* Routes de Agregar al carrito Producto */
Route::post('karatebasico', [App\Http\Controllers\KaratebasicoController::class, 'agregar'])
    ->name('agregarCarritoKarateBasico');

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
