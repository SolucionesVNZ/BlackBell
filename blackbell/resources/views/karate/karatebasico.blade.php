<?php
use Illuminate\Support\Facades\DB;
?>
@extends('layouts.app')
@section('content')
    @if (session('successKarateBasico'))
    <div id="id03" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <p style="padding: 30px; text-align: center;"> {{ session('successKarateBasico') }}
                <div class="row text-center" >
                    <div class="col-md-6">
                        <button type="button" class="btn btn-outline-danger" onclick="document.getElementById('id03').style.display='none'">Seguir comprando</button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('cart') }}" class="btn btn-outline-danger">Ir a mi carrito</a>
                    </div>
                </div>
                </p>
            </div>
        </div>
    </div>
    <script> document.getElementById('id03').style.display='block' </script>
    @endif
       <div class="banner-principal bdisc">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="../../img/portada/banner/banner-izq-2.png" alt="karate" class="karate-img"/>
            </div>
            <div class="col-md-6">
                <div class="form-a form-b lform">
                    <form method="POST" action="{{route('guardarFormulario')}}">
                        @csrf
                        <h1 class="title-form lt1">PONTE EN CONTACTO</h1>
                        <p class="sub-title lt1">(Nuestros asesores estarán felices de atenderte)</p>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-blackbelt" id="inputAddress"
                                   placeholder="Nombres">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lastname" class="form-control form-blackbelt" id="inputAddress"
                                   placeholder="Apellidos">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-blackbelt" id="inputEmail4"
                                   placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control form-blackbelt" id="inputAddress"
                                   placeholder="Teléfono">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <select id="inputState" name="membresia" class="form-control form-blackbelt">
                                    <option disabled="disabled" hidden="hidden" selected>Membresia</option>
                                    <option>Mensual</option>
                                    <option>Trimestral</option>
                                    <option>Semestral</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <?php $url = $_SERVER["REQUEST_URI"]?>
                                <input type="hidden" name="disciplina"  value="Karate Basico">
                                <input type="hidden" name="url"  value="{{ $url }}">
                            <button type="submit" class="btn btn-primary btn-blackbelt">ENVIAR</button>
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="dirigido">
        <div class="container">
            <div class="container-karate">
            <img src="../../img/portada/banner/titulodirigido.png" alt="innovacion" class="tusobjetivos limg2"/>
            </div>
            <p class="text-dirigido"> En el nivel básico todo el mundo puede iniciarse en esta disciplina, independientemente del sexo y la edad.
                <br>Tanto los interesados en aprender defensa  personal, quieran ganar confianza y seguridad  en sí mismos, como aquellos
                que quieran mejorar su condición física, se pueden beneficiar.</p>
        </div>
    </div>
    <div class="banner-disciplina bdisc">
        <div class="container">
            <div class="container-karate">
            <img src="../../img/portada/banner/membresias.png" alt="innovacion" class="tusobjetivos limg1"/>
            </div>
            <?php
            $products = \App\Models\Producto::where([['fk_disciplina', 1],['fk_nivel', 1]])->get();
            ?>
            @foreach ($products as $ps)
            <form method="POST" action="{{route('agregarCarritoKarateBasico')}}">
                @csrf
            <div class="row packec">
                <div class="col-md-6">
                    <b style="  text-transform: uppercase;">{{ $ps->membresia->descripcion }}:</b><br>
                    {!! $ps->descripcion !!}
                    <div style="margin-top: 20px">
                        <input type="hidden" value="1" name="cantidad"/>
                        <input type="hidden" value="{{$ps->id}}" name="idproducto">
                        <input type="hidden" value="{{$ps->precio}}" name="preciounit">
                        <input type="hidden" value="{{$ps->precio}}" name="totalKarateBasico">
                        <?php $url = $_SERVER["REQUEST_URI"]?>
                        <input type="hidden" name="url"  value="{{ $url }}">
                        <button type="submit" class="btn btn-dark">
                            Añadir al carrito | <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 packec2">
                    <span class="precios">S/.{{$ps->precio}}</span>
                </div>
            </div>
            </form>
            <hr>
            @endforeach
        </div>
    </div>
    <div class="banner-disciplina bdisc2">
        <div class="container">
            <div class="container-karate">
            <img src="../../img/portada/banner/profesores.png" alt="innovacion" class="tusobjetivos limg1"/>
            </div>
            <div class="row packec">
                <div class="col-md-5">
                    <img src="../../img/portada/banner/guillermo_foto.jpg" alt="karate" class="karate-img"/>
                </div>
                <div class="col-md-7 packec3">
                    <b>GUILLERMO DE VETTORI:</b><br>
                    Presidente de la Asociación Peruana de Karate Do Tradicional, seleccionado Nacional de Karate Tradicional con 30 años de experiencia.
                    Bicampeón Panamericano Kumite por Equipos ITKF 2007 y WTKF 2019 Instructor y Director del Dojo APKT.<br>
                    <br>
                    <b>Conoce el temario:</b> <a class="btn btn-dark">Aquí</a>
                </div>
            </div>
        </div>
    </div>

    <!----------- MODAL PARA KARATE BASICO ------------
    <div class="modal fade" id="agregarCarritoKarateBasico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar a carrito de compras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('agregarCarritoKarateBasico')}}">
                    @csrf
                <div class="modal-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Descripcion del producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $producto = DB::table('producto')->find(1);
                        $precio = $producto->precio;
                        ?>
                        <tr>
                            <td><?php echo $producto->descripcion;?></td>
                            <td><?php echo 'S/.'.$producto->precio;?></td>
                            <td><input class="form-control" type="number" min="1" value="1" id="cantidad1" name="cantidad" oninput="calc1()"/></td>
                            <td>S/.<span id="total1">129</span></td>
                            <input type="hidden" value="<?php echo $producto->id;?>" name="idproducto">
                            <input type="hidden" value="<?php echo $producto->precio;?>" name="preciounit">
                            <input type="hidden" id="totalKarateBasico" value="129" name="totalKarateBasico">
                            <input type="hidden" value="<?php if(isset(Auth::user()->id)){ echo Auth::user()->id; }else{ echo null; } ?>" name="idusuario">
                            <script>
                                function calc1() {
                                    cant = document.getElementById("cantidad1").value;
                                    total = cant * parseFloat(129)
                                    if (!isNaN(total))
                                        document.getElementById("total1").innerHTML = total
                                        document.getElementById("totalKarateBasico").value = total;
                                }
                            </script>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar en mi carrito</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    ---->
    <!----------- MODAL PARA KARATE INTERMEDIO ------------
    <div class="modal fade" id="agregarCarritoKarateIntermedio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar a carrito de compras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Descripcion del producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $producto = DB::table('producto')->find(2);
                            $precio = $producto->precio;
                            ?>
                            <tr>
                                <td><?php echo $producto->descripcion;?></td>
                                <td><?php echo 'S/.'.$producto->precio;?></td>
                                <td><input class="form-control" type="number" min="1" value="1" id="cantidad2" oninput="calc2()"/></td>
                                <td>S/.<span id="total2" class="clase-precio">349</span></td>
                                <script>
                                    function calc2() {
                                        cant = document.getElementById("cantidad2").value;
                                        total = cant * parseFloat(349)
                                        if (!isNaN(total))
                                            document.getElementById("total2").innerHTML = total
                                    }
                                </script>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    ---->
    <!----------- MODAL PARA KARATE AVANZADO ------------
    <div class="modal fade" id="agregarCarritoKarateAvanzado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar a carrito de compras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Descripcion del producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $producto = DB::table('producto')->find(3);
                            $precio = $producto->precio;
                            ?>
                            <tr>
                                <td><?php echo $producto->descripcion;?></td>
                                <td><?php echo 'S/.'.$producto->precio;?></td>
                                <td><input class="form-control" type="number" min="1" value="1" id="cantidad3" oninput="calc3()"/></td>
                                <td>S/.<span id="total3">699</span></td>
                                <script>
                                    function calc3() {
                                        cant = document.getElementById("cantidad3").value;
                                        total = cant * parseFloat(699)
                                        if (!isNaN(total))
                                            document.getElementById("total3").innerHTML = total
                                    }
                                </script>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    ---->
@endsection
