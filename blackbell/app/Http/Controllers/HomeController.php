<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (session('idShoppingCart')){
            $shoppingCart = ShoppingCart::find(session('idShoppingCart'));
            $product_shopping_cart = $shoppingCart->productShoppingCart()->where('fk_shopping_cart','=',$shoppingCart->id)->first();
            $usuario = Auth::user();
            $countCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->count();
            $userShoppingCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->first();
            if($countCart == 1) {
                $product_shopping_cart->fk_shopping_cart = $userShoppingCart->id;
                $product_shopping_cart->save();
            }elseif ($countCart < 1){
                $shoppingCart->fk_usuario = $usuario->id;
                $shoppingCart->save();
            }
        }
        return view('home');
    }
}
