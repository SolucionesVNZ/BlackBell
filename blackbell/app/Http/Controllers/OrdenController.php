<?php


namespace App\Http\Controllers;


use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class OrdenController
{
    public function mostrarCarrito(){
        $produt_shopping_cart = null;
        $total = 0;
        if(Auth::check()) {
            $usuario = Auth::user();
            $countCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->count();
            $shoppingCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->first();
            if ($countCart > 1) {
                // Problemas!!!!!
                die('Revisar!!!');
            } elseif($countCart == 1) {
                $produt_shopping_cart = $shoppingCart->productShoppingCart;
                $total = $shoppingCart->productShoppingCart()->sum('total');
            }
        }else {
            //Guardo la Sesion en una variable
            if (session('idShoppingCart')){
                $shoppingCart = ShoppingCart::find(session('idShoppingCart'));
                $produt_shopping_cart = $shoppingCart->productShoppingCart;
                $total = $shoppingCart->productShoppingCart()->sum('total');
            }
        }
        return view('orden',['produt_shopping_cart' => $produt_shopping_cart, 'totalShoppingCart' => $total]);
    }
}