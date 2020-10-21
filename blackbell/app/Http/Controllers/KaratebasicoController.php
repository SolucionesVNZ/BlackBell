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
        $slug = substr($request->url, 1);
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
                if(!session('idShoppingCart')){
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
            return redirect()->route($slug)->with('successKarateBasico','Se ha agregado satisfactoriamente el producto al carrito.');
    }

    public function quitarproducto(Request $request){
        DB::table('product_shopping_cart')
            ->where('id', '=', $request->idproducto)->delete();
        return redirect()->route('cart');

    }
}
