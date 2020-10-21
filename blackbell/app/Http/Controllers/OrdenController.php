<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Orden;

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
                return view('cart');
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
        if($produt_shopping_cart == null){
            return redirect()->route('inicio');
        }

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
        if(Auth::check()) {
            $usuario = Auth::user();
            $countCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->count();
            $shoppingCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->first();
            if($countCart == 1) {
                //$produt_shopping_cart = $shoppingCart->productShoppingCart;
                $total = $shoppingCart->productShoppingCart()->sum('total');
                $usuario->fk_tipo_documento = $request->typecard;
                $usuario->document = $request->idcard;
                $usuario->fk_departamento = $request->departament;
                $usuario->fk_provincia = $request->province;
                $usuario->fk_distrito = $request->distrite;
                //$usuario->password = Hash::make('BLACKBELT2020.');
                $usuario->save();

                $ordenModel = new Orden;
                $ordenModel->fk_shopping_cart = $shoppingCart->id;
                $ordenModel->fk_method_pay = $request->paymentMethod;
                $ordenModel->fk_users = $usuario->id;
                $ordenModel->total = $total;
                $ordenModel->save();

                $orden = Orden::where('fk_shopping_cart', $shoppingCart->id)->first();
                $shoppingCart->fk_orden = $orden->id;
                $shoppingCart->subtotal = $total;
                $shoppingCart->save();
                return view('ordensend');
            }
        }else {

        }
    }
}
