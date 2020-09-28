@extends('layouts.app')

@section('content')
    <div class="banner-principal bdisc">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../../img/portada/banner/karate-intermedio.png" alt="karate" class="karate-img"/>
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
            <p class="text-dirigido">Este curso va dirigido  a todas las personas que tengan un conocimiento intermedio
                en el deporte <b>(karate)</b> y quieran continuar aprendiendo nuevas técnicas. <br>Practicando esta disciplina de
                la mano de profesores expertos en el campo.</p>
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
                </div>
                <div class="col-md-6 packec2">
                    <span class="precios">S/.149</span>
                </div>
            </div>
            <hr>
            <div class="row packec">
                <div class="col-md-6 ">
                    <b>TRIMESTRAL:</b><br>
                    12 clases en vivo<br>
                    Acceso al campus virtual<br>
                    Evaluación de grado
                </div>
                <div class="col-md-6 packec2">
                    <span class="precios">S/.369</span>
                </div>
            </div>
            <hr>
            <div class="row packec">
                <div class="col-md-6">
                    <b>SEMESTRAL:</b><br>
                    24 clases en vivo<br>
                    Acceso al campus virtual<br>
                    Evaluación de grado
                </div>
                <div class="col-md-6 packec2">
                    <span class="precios">S/.719</span>
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
@endsection
