<?php


namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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
                $produt_shopping_cart = $shoppingCart->productShoppingCart;
                $total = $shoppingCart->productShoppingCart()->sum('total');
                $usuario->fk_tipo_documento = $request->typecard;
                $usuario->document = $request->idcard;
                $usuario->fk_departamento = $request->departament;
                $usuario->fk_provincia = $request->province;
                $usuario->fk_distrito = $request->distrite;
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
                return view('ordensend',['produt_shopping_cart' => $produt_shopping_cart, 'totalShoppingCart' => $total]);
            }
        }else {

            //Valido los datos y si el correo esta registrado
            $request->validate([
                'name' => 'required',
                'lastname' => 'required',
                'typecard' => 'required',
                'idcard' => 'required',
                'phone' => 'required',
                'email' => 'required|email:rfc,dns|unique:users,email',
                'departament' => 'required',
                'province' => 'required',
                'distrite' => 'required',
                'paymentMethod' => 'required',
            ],[
                'name.required' => 'El nombre es requerido',
                'lastname.required' => 'El apellido es requerido',
                'typecard.required' => 'El tipo de documento es requerido',
                'idcard.required' => 'El numero de documento es requerido',
                'phone.required' => 'El telefono es requerido ',
                'email.required' => 'El correo electrnico es obligatorio',
                'email.email' => 'El correo electronico ingresado no es correcto',
                'email.unique' => 'Usted ya tiene una cuenta registrada con este correo electronico, por favor inicie sesión para proceder con la compra.',
                'departament.required'  => 'Debe seleccionar un departamento ',
                'province.required'  => 'Debe seleccionar una provincia',
                'distrite.required'  => 'Debe seleccionar un distrito',
                'paymentMethod.required'  => 'Debe seleccionar un metodo de pago',
            ]);

            try{
                $users = new User;
                $users->name = $request->name;
                $users->lastname = $request->lastname;
                $users->fk_tipo_documento = $request->typecard;
                $users->document = $request->idcard;
                $users->fk_departamento = $request->departament;
                $users->fk_provincia = $request->province;
                $users->fk_distrito = $request->distrite;
                $users->phone = $request->phone;
                $users->email = $request->email;
                $users->password = Hash::make('BLACKBELT2020.');
                $users->save();

                if (session('idShoppingCart')){
                    $shoppingCart = ShoppingCart::find(session('idShoppingCart'));
                    $produt_shopping_cart = $shoppingCart->productShoppingCart;
                    $total = $shoppingCart->productShoppingCart()->sum('total');
                }

                $usuario = User::where('email', $request->email)->first();
                $ordenModel = new Orden;
                $ordenModel->fk_shopping_cart = $shoppingCart->id;
                $ordenModel->fk_method_pay = $request->paymentMethod;
                $ordenModel->fk_users = $usuario->id;
                $ordenModel->total = $total;
                $ordenModel->save();

                $orden = Orden::where('fk_shopping_cart', $shoppingCart->id)->first();
                $shoppingCart->fk_usuario = $usuario->id;
                $shoppingCart->fk_orden = $orden->id;
                $shoppingCart->subtotal = $total;
                $shoppingCart->save();
                $request->session()->flush();
                Auth::loginUsingId($usuario->id);
                return view('ordensend',['produt_shopping_cart' => $produt_shopping_cart, 'totalShoppingCart' => $total]);
            }catch(QueryException $e){
                return redirect()->route('finalizar-compra');
            }
        }
    }
}
