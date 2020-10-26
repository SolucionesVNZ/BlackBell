@extends('layouts.app')
@section('content')
    <div class="container" style="padding: 30px">
    <div class="card text-center">
        <div class="card-header">
            <h5 class="card-title">¡MUCHAS GRACIAS POR TU COMPRA!</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title font-weight-bold">Detalle de tu Orden</h5>
                    <p class="card-text">Tu orden ha sido enviada, en breve recibiras un correo de confirmación.</p>
                    <table class="table table-bordered">
                        <thead>
                        <tr class="bg-danger" style="color: #fff;">
                            <th scope="col">Descripcion del producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col" style="width: 30px;">Cantidad</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($produt_shopping_cart)
                            @foreach($produt_shopping_cart as $psc)
                                <tr>
                                    <td> {{ $psc->product->disciplina->descripcion }} {{ $psc->product->nivel->descripcion }} - Membresia: {{ $psc->product->membresia->descripcion }}</td>
                                    <td>S/.{{ $psc->precio_unit }}</td>
                                    <td>{{ $psc->cantidad }}</td>
                                    <td>S/.<span id="total1">{{ $psc->total }}</span></td>
                                </tr>
                                </form>
                            @endforeach
                        @endisset
                        <tr>
                            <td colspan="3" class="text-right"><span class="font-weight-bold">Subtotal</span></td>
                            <td style="font-weight: bold;font-size: 1.2em;">S/.{{  $totalShoppingCart }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><span class="font-weight-bold">Total</span></td>
                           <td style="font-weight: bold;font-size: 1.2em;">S/.{{ $totalShoppingCart }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h3>Nota Importante:</h3>
                    <b>Estatus de la orden:</b>
                    <div class="alert alert-success" role="alert">
                        Verificando el pago
                    </div>
                    <p><b>Si ya realizaste el pago</b>, no te olvides de enviarnos el Voucher al correo electronico:
                        <a style="color: #E3342F;" href="mailto:info@latamcoachingnetwork.com">info@latamcoachingnetwork.com</a>
                    </p>
                    <p><b>Si aun no haz realizado el pago de la orden</b>, estos son los bancos donde recepcionamos:</p>
                    <div class="card-group">
                        <div class="card">
                            <img class="card-img-top" width="200px" src="../../img/cuentas/Banco-de-Credito-del-Peru.png" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Banco de Credito </h5>
                                <p class="card-text">9999-9999-9999-9999</p>
                                <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" width="200px" src="../../img/cuentas/interbank.png" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Banco Interbank</h5>
                                <p class="card-text">9999-9999-9999-9999</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <a href="#" class="btn btn-danger">DESCARGAR ORDEN GENERADA</a>
        </div>
    </div>
    </div>
@endsection
