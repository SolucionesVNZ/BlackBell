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
                    <img src="../../img/portada/disciplina/karate-c.png" alt="karate" class="karate-img"/>
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
                                        <option>Muay Thai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <?php $url = $_SERVER["REQUEST_URI"]?>
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
            <p class="text-dirigido">Este curso va dirigido a todas las personas que tengan un conocimiento avanzado
                en el deporte <b>(karate)</b> y quieran continuar aprendiendo nuevas técnicas. Practicando esta
                disciplina
                de la mano de profesores expertos en el campo.</p>
        </div>
    </div>
    <div class="banner-disciplina bdisc">
        <div class="container">
            <div class="container-karate">
                <img src="../../img/portada/banner/membresias.png" alt="innovacion" class="tusobjetivos limg1"/>
            </div>
            <?php
            $products = \App\Models\Producto::where([['fk_disciplina', 1],['fk_nivel', 3]])->get();
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
@endsection
