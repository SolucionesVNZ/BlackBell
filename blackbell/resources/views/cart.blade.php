@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <h2 style="padding: 30px">Tu carrito de compras</h2>
        <table class="table table-bordered">
            <thead>
            <tr class="bg-danger" style="color: #fff;">
                <th scope="col">Descripcion del producto</th>
                <th scope="col">Precio</th>
                <th scope="col" style="width: 30px;">Cantidad</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
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
                <form method="POST" action="{{route('actualizarCarritoKarateBasico')}}">
                    @csrf
                <tr>
                    <td><?php echo $psc->product->disciplina->descripcion . ' - Membresia: ' . $psc->product->membresia->descripcion;?></td>
                    <td><?php echo 'S/.' . $psc->precio_unit;?></td>
                    <td><input class="form-control" type="number" min="1" value="<?php echo $psc->cantidad?>"
                               name="cantidad"/></td>
                    <td>S/.<span id="total1"><?php echo $psc->total?></span></td>
                    <input type="hidden" value="<?php echo $psc->product->id;?>" name="idproducto">
                    <td> <button type="submit" class="btn btn-outline-danger">Actualizar</button>
                        <a href="{{url('cart',['idproducto' => $psc->id ])}}" class="btn btn-outline-danger"><i
                                class="far fa-trash-alt"></i></a></td>
                    <input type="hidden" value="<?php echo $psc->precio_unit;?>" name="preciounit">
                    <input type="hidden" value="<?php echo $psc->total;?>" name="totalKarateBasico">
                </tr>
                </form>
                <?php }
                ?>
                <tr>
                    <td colspan="5">
                        <div style="text-align: left">
                            <a href="{{route('karatebasico')}}" class="btn btn-outline-secondary">Seguir
                                comprando</a>
                        </div>
                    </td>
                </tr>
            <?php
            }else {
                ?>
            <?php
            }
            ?>
            </tbody>
        </table>

        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th scope="col" colspan="2">Total del carrito</th>
            </tr>
            </thead>
            <tbody>
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
            <tr>
                <td>Subtotal</td>
                <td><?php echo 'S/.' . $total ?></td>
            </tr>
            <tr>
                <td>Total</td>
                <td><?php echo 'S/.' . $total ?></td>
            </tr>
            <?php
            }
            ?>

            <tr>
                <td colspan="2">
                    <a href="{{route('finalizar-compra')}}" class="btn btn-danger">Continuar la compra</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
