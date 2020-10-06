<?php
use Illuminate\Support\Facades\DB;
?>
@extends('layouts.app')
@section('content')
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
                            <div class="form-group col-md-6">
                                <select id="inputState" name="membresia" class="form-control form-blackbelt">
                                    <option disabled="disabled" hidden="hidden" selected>Membresia</option>
                                    <option>Mensual</option>
                                    <option>Trimestral</option>
                                    <option>Semestral</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <select id="inputState" name="disciplina" class="form-control form-blackbelt">
                                    <option disabled="disabled" hidden="hidden" selected>Disciplina</option>
                                    <option>Karate</option>
                                    <option>Kun fu</option>
                                    <option>Taekwondo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
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
            <div class="row packec">
                <div class="col-md-6">
                    <b>MENSUAL:</b><br>
                    4 clases en vivo<br>
                    Acceso al campus virtual
                <div style="margin-top: 20px">
                    <a type="button" class="btn btn-dark" data-toggle="modal" data-target="#agregarCarritoKarateBasico">
                        Añadir al carrito | <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
                </div>
                <div class="col-md-6 packec2">
                    <span class="precios">S/.129</span>
                </div>
            </div>
            <hr>
            <div class="row packec">
                <div class="col-md-6 ">
                    <b>TRIMESTRAL:</b><br>
                    12 clases en vivo<br>
                    Acceso al campus virtual<br>
                    Evaluación de grado
                    <div style="margin-top: 20px">
                        <a type="button" class="btn btn-dark" data-toggle="modal" data-target="#agregarCarritoKarateIntermedio">
                            Añadir al carrito | <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 packec2">
                    <span class="precios">S/.349</span>
                </div>
            </div>
            <hr>
            <div class="row packec">
                <div class="col-md-6">
                    <b>SEMESTRAL:</b><br>
                    24 clases en vivo<br>
                    Acceso al campus virtual<br>
                    Evaluación de grado
                    <div style="margin-top: 20px">
                        <a type="button" class="btn btn-dark" data-toggle="modal" data-target="#agregarCarritoKarateAvanzado">
                            Añadir al carrito | <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 packec2">
                    <span class="precios">S/.699</span>
                </div>
            </div>
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
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed Lorem ipsum dolor sit amet,
                    consectetuer adipiscing elit, sed Lorem ipsum dolor sit amet, amet, consectetuer
                    adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                    erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                    suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure.<br>
                    <br>
                    <b>Conoce el temario:</b> <a class="btn btn-dark">Aquí</a>
                </div>
            </div>
        </div>
    </div>

    <!----------- MODAL PARA KARATE BASICO ---------------->
    <div class="modal fade" id="agregarCarritoKarateBasico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar a carrito de compras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="">
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
                            <td><input class="form-control" type="number" min="1" value="1" id="cantidad1" oninput="calc1()"/></td>
                            <td>S/.<span id="total1">129</span></td>
                            <input type="hidden" id="totalKarateBasico" value="" name="totalKarateBasico">
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

    <!----------- MODAL PARA KARATE INTERMEDIO ---------------->
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

    <!----------- MODAL PARA KARATE AVANZADO ---------------->
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

@endsection
