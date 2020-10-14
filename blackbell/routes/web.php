<?php

use App\Http\Controllers\KaratebasicoController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/cart', function () {
    //$value = session('key');
    //var_dump($value);die;
    /*
    $produt_shopping_cart = \App\Models\ShoppingCart::find(53)->productShoppingCart;
    foreach($produt_shopping_cart as $psc){
        echo $psc->cantidad.' - '.$psc->product->descripcion.'<br/>';
    }
    */
    return view('cart');
})->name('cart');

Route::get('/karate/karatebasico', function () {
    return view('karate/karatebasico');
})->name('karatebasico');

Route::get('/karate/karateintermedio', function () {
    return view('karate/karateintermedio');
})->name('karateintermedio');

Route::get('/karate/karateavanzado', function () {
    return view('karate/karateavanzado');
})->name('karateavanzado');

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

/* Route para Orden */
Route::get('/finalizar-compra', function () {
    return view('orden');
})->name('finalizar-compra');

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
