@extends('layouts.main')
@section('content')
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
                            ->where('shopping_cart.fk_usuario', '=', null)
                            ->first();
                        echo $cantidad->cant_prod
                        ?>
                    @else
                        <?php
                        $cantidad = DB::table('product_shopping_cart')
                            ->select(DB::raw('SUM(product_shopping_cart.cantidad) as cant_prod'))
                            ->join('shopping_cart', 'product_shopping_cart.fk_shopping_cart', '=', 'shopping_cart.id')
                            ->join('users', 'shopping_cart.fk_usuario', '=', 'users.id')
                            ->where('users.id', '=', Auth::user()->id)
                            ->first();
                        echo $cantidad->cant_prod
                        ?>
                    @endguest
                </span>
            </h4>
            <ul class="list-group mb-3">
                <?php
                if(Auth::check()) {
                    $usuario = Auth::user();
                    $countCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->count();
                    $shoppingCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->first();
                    if ($countCart > 1) {
                        // Problemas!!!!!
                        die('Revisar!!!');
                    }if ($countCart == 0) {
                        die('Tu carrito esta vacio');
                    }
                    $produt_shopping_cart = $shoppingCart->productShoppingCart;
                    foreach($produt_shopping_cart as $psc){?>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><?php echo $psc->product->disciplina->descripcion;?></h6>
                        <small class="text-muted"><?php echo 'Membresia: '.$psc->product->membresia->descripcion;?></small>
                    </div>
                    <span class="text-muted"><?php echo $psc->cantidad?> x <?php echo $psc->precio_unit;?>
                        <br>
                        <small class="text-muted"><?php echo 'S/.'.$psc->total;?></small>
                    </span>
                </li>
                <?php }
                ?>
                    <?php
                    }else {
                        ?>
            <?php
                    }
                    ?>
                    <?php
                    if(Auth::check()) {
                        $usuario = Auth::user();
                        $countCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->count();
                        $shoppingCart = $usuario->shoppgingCarts()->whereNull('fk_orden')->first();

                        if ($countCart > 1) {
                            // Problemas!!!!!
                            die('Revisar!!!');
                        }if ($countCart == 0) {
                            die('Tu carrito esta vacio');
                        }
                        $total = $shoppingCart->productShoppingCart()->sum('total');?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total</span>
                    <strong><?php echo 'S/.' . $total ?></strong>
                </li>
                    <?php
                    }
                    ?>
            </ul>

        </div>
        <div class="col-md-8 order-md-1">
            @guest
                <p class="text-right" style="padding: 30px 30px 0px 30px">¿Ya tienes cuenta? <a href="#"  style="color: #D51C24;">Iniciar Sesión</a></p>
            @else
                <p class="text-right" style="padding: 30px 30px 0px 30px">Hola {{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>

            @endguest
            <h4 class="mb-3">Informacion de contacto</h4>
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nombres</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Apellidos</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email">Documento de identidad</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tipo</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">DNI</a>
                                    <a class="dropdown-item" href="#">Carnet de extrangeria</a>
                                    <a class="dropdown-item" href="#">Pasaporte</a>
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Teléfono</label>
                        <input type="text" class="form-control" id="phone" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Correo electronico </label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="country">Departamento</label>
                        <select class="custom-select d-block w-100" id="country" required>
                            <option value="">Seleccione...</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">Provincia</label>
                        <select class="custom-select d-block w-100" id="state" required>
                            <option value="">Seleccione...</option>
                            <option>California</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">Distrito</label>
                        <select class="custom-select d-block w-100" id="state" required>
                            <option value="">Seleccione...</option>
                            <option>California</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                </div>

                <hr class="mb-4">

                <h4 class="mb-3">Metodo de Pago</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="credit">Transferencia Bancaria</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="debit">Tarjeta de debito</label>
                    </div>
                </div>
                <div class="row">
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
                <hr class="mb-4">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a href="{{route('cart')}}" style="color: #D51C24;">< Volver al carrito</a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button class="btn btn-danger btn-lg btn-block" type="submit">Finalizar la compra </button>

                    </div>
                    </div>
                <hr class="mb-4">
            </form>
        </div>
    </div>
</div>
@endsection
