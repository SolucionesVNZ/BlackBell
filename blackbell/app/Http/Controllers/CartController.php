<?php


namespace App\Http\Controllers;


use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class CartController
{
    public function mostrarCarrito(){
        //$value = session('key');
        //var_dump($value);die;
        /*
        $produt_shopping_cart = \App\Models\ShoppingCart::find(53)->productShoppingCart;
        foreach($produt_shopping_cart as $psc){
            echo $psc->cantidad.' - '.$psc->product->descripcion.'<br/>';
        }
        */
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
        return view('cart',['produt_shopping_cart' => $produt_shopping_cart, 'totalShoppingCart' => $total]);
    }
}
