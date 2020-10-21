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
                @isset($produt_shopping_cart)
                    @foreach($produt_shopping_cart as $psc)
                        <form method="POST" action="{{route('actualizarCarritoKarateBasico')}}">
                            @csrf
                            <tr>
                                <td> {{ $psc->product->disciplina->descripcion }} {{ $psc->product->nivel->descripcion }} - Membresia: {{ $psc->product->membresia->descripcion }}</td>
                                <td>S/.{{ $psc->precio_unit }}</td>
                                <td><input class="form-control" type="number" min="1" value="{{ $psc->cantidad }}"
                                           name="cantidad"/></td>
                                <td>S/.<span id="total1">{{ $psc->total }}</span></td>
                                <input type="hidden" value="{{ $psc->product->id }}" name="idproducto">
                                <td> <button type="submit" class="btn btn-outline-danger">Actualizar</button>
                                    <a href="{{url('cart',['idproducto' => $psc->id ])}}" class="btn btn-outline-danger"><i
                                            class="far fa-trash-alt"></i></a></td>
                                <input type="hidden" value="{{ $psc->precio_unit }}" name="preciounit">
                                <input type="hidden" value="{{ $psc->total }}" name="totalKarateBasico">
                            </tr>
                        </form>
                    @endforeach
                @endisset
                @if($totalShoppingCart == 0)
                   <tr>
                       <td colspan="5"> Aun no has agregado productos a tu carrito de compras.</td>
                   </tr>
                @endif
                <tr>
                    <td colspan="5">
                        <div style="text-align: left">
                            <a href="{{route('karate-basico')}}" class="btn btn-outline-secondary">Seguir comprando</a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th scope="col" colspan="2">Total del carrito</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Subtotal</td>
                <td>S/.{{  $totalShoppingCart }}</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>S/.{{ $totalShoppingCart }}</td>
            </tr>
            @if($totalShoppingCart > 0)
            <tr>
                <td colspan="2">
                    <a href="{{route('finalizar-compra')}}" class="btn btn-danger">Continuar la compra</a>
                </td>
            </tr>
            @else
            <tr>
                <td colspan="2">
                    <a href="#" class="btn btn-danger disabled">Continuar la compra</a>
                </td>
            </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
