<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ShoppingCart;
use App\Models\ProductShoppingCart;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class KaratebasicoController
{
    public function agregar(Request $request)
    {
        // try {
            // Esta logueado?
            if(Auth::check()){
                //Verificar si hay id de carrito en sesion
                //
                $usuario = Auth::user();
            // SI
                //Tiene carrito sin orden?
                $countCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->count();
                $shoppingCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->first();
                if($countCart > 1){
                    // Problemas!!!!!
                    die('Revisar!!!');
                }if($countCart == 0){
                    // Crear Carrito
                    $shoppingCart = new ShoppingCart();
                    $shoppingCart->usuario()->associate($usuario);
                    $shoppingCart->save();
                }
                $productShoppingCartCount = $shoppingCart->productShoppingCart()->where('fk_producto', $request->idproducto)->count();
                $productShoppingCart = $shoppingCart->productShoppingCart()->where('fk_producto', $request->idproducto)->first();
                // SI el producto ya esta en el carrito, actualizar
                if($productShoppingCartCount == 1){
                    $productShoppingCart->cantidad = $productShoppingCart->cantidad + $request->cantidad;
                    $productShoppingCart->total = $productShoppingCart->total + $request->preciounit;
                    $productShoppingCart->save();
                }if($productShoppingCartCount == 0){
                // SI el producto no esta en el carrito Agregar producto en el carrito
                    $product = Producto::find($request->idproducto);
                    $shoppingCart->products()->attach($product,[
                        'cantidad' => $request->cantidad,
                        'precio_unit' => $request->preciounit,
                        'total' => $request->totalKarateBasico
                    ]);
                }
            }else{
            // NO
                $value = session('idShoppingCart');
                // Tiene en sesion ID de carrito?
                if(isNull($value)){
                // Es nulo
                    // Crear carrito
                    $shoppingCart = new ShoppingCart();
                    $shoppingCart->save();
                    // Guardar en sesion el ID del carrito
                    session(['idShoppingCart' => $shoppingCart->id]);
                    $value = $shoppingCart->id;
                }
                $shoppingCart = ShoppingCart::find($value);
                // Agregar producto al carrito
                $productShoppingCartCount = $shoppingCart->productShoppingCart()->where('fk_producto', $request->idproducto)->count();
                $productShoppingCart = $shoppingCart->productShoppingCart()->where('fk_producto', $request->idproducto)->first();
                // SI el producto ya esta en el carrito, actualizar
                if($productShoppingCartCount == 1){
                    $productShoppingCart->cantidad = $productShoppingCart->cantidad + $request->cantidad;
                    $productShoppingCart->total = $productShoppingCart->total + $request->preciounit;
                    $productShoppingCart->save();
                }if($productShoppingCartCount == 0){
                    // SI el producto no esta en el carrito Agregar producto en el carrito
                    $product = Producto::find($request->idproducto);
                    $shoppingCart->products()->attach($product,[
                        'cantidad' => $request->cantidad,
                        'precio_unit' => $request->preciounit,
                        'total' => $request->totalKarateBasico
                    ]);
                }
            }
            /*
            $model = new ShoppingCart();
            $model->fk_usuario = $request->idusuario;
            $model->subtotal = $request->totalKarateBasico;
            $model->save();

            $model_producto_carrito = new ProductShoppingCart();
            $ultimo_carrito = DB::table('shopping_cart')
                ->join('users', 'shopping_cart.fk_usuario', '=', 'users.id')
                ->orderBy('id','desc')
                ->select('shopping_cart.id')
                ->limit(1)
                ->first();
            if($ultimo_carrito == null){
                $ultimo_carrito = DB::table('shopping_cart')
                    ->orderBy('id','desc')
                    ->select('shopping_cart.id')
                    ->limit(1)
                    ->first();
            }
            //var_dump($ultimo_carrito);die;
            /*
            $allCarts = ShoppingCart::all();
            foreach($allCarts as $cart){
                var_dump($cart->usuario->name);
            }die();
            */
             /*
            $model_producto_carrito->fk_shopping_cart = $ultimo_carrito->id;
            $model_producto_carrito->fk_producto = $request->idproducto;
            $model_producto_carrito->cantidad = $request->cantidad;
            $model_producto_carrito->precio_unit = $request->preciounit;
            $model_producto_carrito->total = $request->totalKarateBasico;
            $model_producto_carrito->save();
             */
            return redirect()->route('karatebasico')->with('successKarateBasico','Se ha agregado satisfactoriamente el producto al carrito.');
        // }catch (QueryException $e) {
        //     return redirect()->route('karatebasico');
        // }
    }

    public function  updateCart(Request $request){
        try {
            if(Auth::check()){
                $usuario = Auth::user();
                $shoppingCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->first();
                $productShoppingCart = $shoppingCart->productShoppingCart()->where('fk_producto', $request->idproducto)->first();
                $productShoppingCart->cantidad = $request->cantidad;
                $productShoppingCart->total = $request->cantidad * $request->preciounit;
                $productShoppingCart->save();
            }
            return redirect()->route('cart');
        }catch (QueryException $e) {
            var_dump('error');die;
            return redirect()->route('cart');
        }

    }

    public function quitarproducto(Request $request){
        DB::table('product_shopping_cart')
            ->where('id', '=', $request->idproducto)->delete();
        return redirect()->route('cart');

    }


}
