<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
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

        $departamentos = DB::table('departamento')
            ->select('*')
            ->get();

        return view('orden',[
            'produt_shopping_cart' => $produt_shopping_cart,
            'totalShoppingCart' => $total,
            'departamentos' => $departamentos]);
    }

    public function getProvincias($id) {
        $provincias = DB::table("provincia")->where("fk_departamento",$id)->pluck("nomProv","id");
        return json_encode($provincias);
    }

    public function getDistritos($id) {
        $distritos = DB::table("distrito")->where("fk_provincia",$id)->pluck("nomDist","id");
        return json_encode($distritos);
    }

    public function crearOrden(Request $request){
        var_dump($request->name);
        var_dump($request->lastname);
        var_dump($request->idcard);
        var_dump($request->phone);
        var_dump($request->email);
        var_dump($request->departament);
        var_dump($request->province);
        var_dump($request->distrite);
        var_dump($request->paymentMethod);die;

    }
}
