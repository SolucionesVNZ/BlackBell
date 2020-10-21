@extends('layouts.main')
@section('content')
    <style>
        #loader{
            visibility:hidden;
        }
    </style>
<div class="container">
    <h3 class="text-center" style="color:#000; font-weight: bold;">FINALIZAR COMPRA</h3>
    <hr class="separator-block">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Mi carrito</span>
                <span class="badge badge-danger badge-pill">
                    @guest
                        <?php
                        $cantidad = DB::table('product_shopping_cart')
                            ->select(DB::raw('SUM(product_shopping_cart.cantidad) as cant_prod'))
                            ->join('shopping_cart', 'product_shopping_cart.fk_shopping_cart', '=', 'shopping_cart.id')
                            ->where('shopping_cart.id', '=', session('idShoppingCart'))
                            ->first();
                        ?>
                        {{$cantidad->cant_prod}}
                    @else
                        <?php
                        $cantidad = DB::table('product_shopping_cart')
                            ->select(DB::raw('SUM(product_shopping_cart.cantidad) as cant_prod'))
                            ->join('shopping_cart', 'product_shopping_cart.fk_shopping_cart', '=', 'shopping_cart.id')
                            ->join('users', 'shopping_cart.fk_usuario', '=', 'users.id')
                            ->where('users.id', '=', Auth::user()->id)
                            ->first();
                        ?>
                        {{$cantidad->cant_prod}}
                    @endguest
                </span>
            </h4>
            <ul class="list-group mb-3">
                @foreach($produt_shopping_cart as $psc)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{$psc->product->disciplina->descripcion}}</h6>
                            <small class="text-muted">Membresia: {{$psc->product->membresia->descripcion}}</small>
                        </div>
                        <span class="text-muted">{{$psc->cantidad}} x {{$psc->precio_unit}}
                        <br>
                        <small class="text-muted">S/. {{$psc->total}}</small>
                    </span>
                    </li>
                @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>S/.{{$totalShoppingCart}}</strong>
                    </li>


            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            @guest
                <p class="text-right" style="padding: 30px 30px 0px 30px">¿Ya tienes cuenta? <a href="{{route('login')}}"  style="color: #D51C24;">Iniciar Sesión</a></p>
            @else
                <p class="text-right" style="padding: 30px 30px 0px 30px">Hola {{ Auth::user()->name }} {{ Auth::user()->lastname }}.  <a href="{{route('logout')}}"  style="color: #D51C24;">Cerrar Sesiòn.</a></p>

            @endguest
            <h4 class="mb-3">Informacion de contacto</h4>
            <form class="needs-validation" novalidate method="POST" action="{{route('crearOrden')}}">
                    @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nombres</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="" value="@isset(Auth::user()->id) {{Auth::user()->name}} @endisset" autocomplete="on" @isset(Auth::user()->id)  readonly @endisset required>
                        <div class="invalid-feedback">
                            Se requiere un nombre válido.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Apellidos</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" value="@isset(Auth::user()->id) {{Auth::user()->lastname}} @endisset" autocomplete="on" @isset(Auth::user()->name)  readonly @endisset required>
                        <div class="invalid-feedback">
                            Se requiere un apellido válido.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email">Documento de identidad</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <select class="form-control custom-select" name="typecard" required>
                                    <option disabled="disabled" hidden="hidden">Tipo</option>
                                    <option value="1">DNI</option>
                                    <option value="2">C.E.</option>
                                    <option value="3">Pasaporte</option>
                                 </select>
                            </div>
                            <input type="text" class="form-control" name="idcard" required>
                            <div class="invalid-feedback">
                                Se requiere un tipo de documento y un documento de identidad válido.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Teléfono</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="@isset(Auth::user()->id) {{Auth::user()->phone}} @endisset" autocomplete="on" @isset(Auth::user()->name)  readonly @endisset required>
                        <div class="invalid-feedback">
                            Se requiere un telefono válido.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Correo electronico </label>
                    <input type="email" class="form-control" id="email" name="email" value="@isset(Auth::user()->id) {{Auth::user()->email}} @endisset" placeholder="usuario@ejemplo.com" autocomplete="on" @isset(Auth::user()->name)  readonly @endisset required>
                    <div class="invalid-feedback">
                        Ingrese una dirección de correo electrónico válida para recibir información de su compra.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="country">Departamento</label>
                        <select class="custom-select d-block w-100" id="departament" name="departament" onchange="onDepartament()" required>
                            <option value="">Seleccione...</option>
                            @foreach($departamentos as $departamento)
                            <option value="{{$departamento->id}}">{{$departamento->nomDepa}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Seleccione un departamento válido.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">Provincia</label>
                        <select class="custom-select d-block w-100" id="province" name="province" required>
                            <option value="">Seleccione...</option>
                        </select>
                        <div class="invalid-feedback">
                            Seleccione una provincia válida.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">Distrito</label>
                        <select class="custom-select d-block w-100" id="distrite" name="distrite" required>
                            <option value="">Seleccione...</option>
                        </select>
                        <div class="invalid-feedback">
                            Seleccione un distrito válido.
                        </div>
                    </div>
                </div>
                <div class="col-md-2"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>

                <hr class="mb-4">

                <h4 class="mb-3">Metodo de Pago</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" value="1" class="custom-control-input pago" required>
                        <label class="custom-control-label" for="credit">Transferencia Bancaria</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" value="2" class="custom-control-input pago" required>
                        <label class="custom-control-label" for="debit">Tarjeta de debito</label>
                    </div>
                </div>
                <div class="bancos" style="display:none;">
                <div class="row" >
                    <div class="col-md-6 mb-3">
                        <label for="cc-name">Banco de Credito</label>
                        <input type="text" class="form-control" id="cc-name" placeholder="1234-1234-1234-1234" disabled>
                        <small class="text-muted">RUC : 999999999-0</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cc-number">Interbank</label>
                        <input type="text" class="form-control" id="cc-number" placeholder="1234-1234-1234-1234" disabled>
                        <small class="text-muted">RUC : 999999999-0</small>
                    </div>
                </div>
                </div>
                <div class="info" style="display:none;">
                <div class="row">
                  <p>Metodo de pago aun no disponible.</p>
                </div>
                </div>
                <hr class="mb-4">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a href="{{route('cart')}}" style="color: #D51C24;">< Volver al carrito</a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button class="btn btn-danger btn-lg btn-block method-disponible" type="submit">Finalizar la compra </button>

                    </div>
                    </div>
                <hr class="mb-4">
            </form>
        </div>
    </div>
</div>
@endsection
