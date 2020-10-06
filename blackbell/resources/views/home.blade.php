@extends('layouts.app')

@section('content')
    <div class="banner-principal">
        <div class="form-a">
            <form method="POST" action="{{route('guardarFormulario')}}">
                @csrf
                <h1 class="title-form">PONTE EN CONTACTO</h1>
                <p class="sub-title">(Nuestros asesores estarán felices de atenderte)</p>
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
    <div class="container">
        <img src="../../img/portada/banner/tusobjetivos.png" alt="innovacion" class="tusobjetivos"/>
        <ul class="flex-container">
            <li class="flex-item">
                <img src="../../img/portada/disciplina/defensa-personal.jpg" alt="innovacion"/>
                <div class="disciplinas">
                <h4 class="title-disciplina">Defensa Personal</h4>
                    <hr class="separator-block">
                <p>Desarrolla técnicas de defensa personal y ten los medios para defenderte o impedir ataques.</p>
                </div>
            </li>
            <li class="flex-item">
                <img src="../../img/portada/disciplina/artes-marciales.jpg" alt="emprendimiento"/>
                <div class="disciplinas">
                <h4 class="title-disciplina">Artes Marciales</h4>
                    <hr class="separator-block">
                    <p>Maximiza tu técnica junto con los mejores instructores de Karate y Muay Thai.</p>
                </div>
            </li>
            <li class="flex-item">
                <img src="../../img/portada/disciplina/mantente-en-forma.jpg" alt="corporacion"/>
                <div class="disciplinas">
                <h4 class="title-disciplina">Mantente en forma</h4>
                    <hr class="separator-block">
                    <p>Mantén tu peso ideal acompañado de ejercicios funcionales.</p>
                </div>
            </li>
        </ul>
    </div>
    <div class="banner-disciplina">
        <div class="container">
        <h2 class="disciplina-title">CONOCE MÁS DE NUESTRAS DISCIPLINAS</h2>
            <hr class="separator-block">
            <ul class="flex-container">
            <li class="flex-item-d">
                <img src="../../img/portada/disciplina/muay-thai.jpg" alt="karate"/>
                <div class="disciplinas">
                    <h4 class="disciplina-mk">MUAY THAI</h4>
                </div>
            </li>
            <li class="flex-item-d">
                <img src="../../img/portada/disciplina/karate.jpg" alt="muay-thai"/>
                <div class="disciplinas">
                    <h4 class="disciplina-mk ">KARATE</h4>
                </div>
            </li>
        </ul>
        </div>
    </div>
    <div class="banner-evento">
        <div class="row">
            <div class="offset-md-6  col-md-4">
                <div class="espaciado">
                <h2 class="evento-title">PRÓXIMO EVENTO</h2>
                <div class="separador"></div>
                <p class="text-evento">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                    laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                    dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                    facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                </p>
                </div>
            </div>
        </div>
    </div>
  <!--  <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('guardarFormulario')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="name" class="form-control" id="inputAddress"
                                           placeholder="Nombres">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="lastname" class="form-control" id="inputAddress"
                                           placeholder="Apellidos">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="email" name="email" class="form-control" id="inputEmail4"
                                           placeholder="Email">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="phone" class="form-control" id="inputAddress"
                                           placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <select id="inputState" name="membresia" class="form-control">
                                        <option selected>Membresia</option>
                                        <option>Mensual</option>
                                        <option>Trimestral</option>
                                        <option>Semestral</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select id="inputState" name="disciplina" class="form-control">
                                        <option selected>Disciplina</option>
                                        <option>Karate</option>
                                        <option>Kun fu</option>
                                        <option>Taekwondo</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">ENVIAR</button>
                        </form>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Tu no estas logueado!') }}
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection