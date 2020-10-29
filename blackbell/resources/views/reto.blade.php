@extends('layouts.app')
@section('content')
    <div class="banner-reto">
        <div class="row">
            <div class="col-md-6">
                <img class="principal" src="../../img/reto/principal.png" alt="innovacion"/>
            </div>
            <div class="col-md-6">
                <div class="form-c">
                    <form method="POST" action="{{route('guardarReto')}}">
                        @csrf
                        <h1 class="title-form">Empieza el RETO AHORA</h1>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control form-blackbelt" id="inputAddress"
                                       placeholder="Nombres">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="lastname" class="form-control form-blackbelt" id="inputAddress"
                                       placeholder="Apellidos">
                            </div>
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
                            <select id="inputState" name="entrada" class="form-control form-blackbelt">
                                <option disabled="disabled" hidden="hidden" selected>Tipo de entrada</option>
                                <option>Gratuita</option>
                                <option>VIP 50</option>
                                <option>PREMIUM 100</option>
                                <option>BLACK 139</option>
                            </select>
                        </div>
                            <div class="form-group col-md-6">
                                <select id="inputState" name="horario" class="form-control form-blackbelt">
                                    <option disabled="disabled" hidden="hidden" selected>Horario</option>
                                    <option>AM</option>
                                    <option>PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <?php $url = $_SERVER["REQUEST_URI"]?>
                                <input type="hidden" name="url"  value="{{ $url }}">
                            <button type="submit" class="btn btn-primary btn-blackbelt">REGISTRARME</button>
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
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img style="margin-top: 60px; width: 100%;" src="../../img/reto/fotografia.png" alt="innovacion"/>
            </div>
            <div class="col-md-6">
                <div class="espaciado-force">
                    <h2 class="evento-title evento-force">Únete al <br>BLACK BELT FORCE</h2>
                    <p class="text-evento text-force">Una comunidad que pelea día a día para llegar a sus resultados
                        dando el 200% en todo lo que se propone.! <b>Disciplina, Motivación
                        y Resultados</b> es lo que nos une en este
                        camino de llegar a donde queremos estar.
                    </p>
                    <div class="separador-force"></div>
                </div>
            </div>
        </div>
        <ul class="flex-container">
            <li class="flex-item black-force">
                <img src="../../img/reto/1.png" alt="innovacion"/>
                <div class="disciplinas">
                    <h4 class="title-disciplina title-force">Motivación</h4>
                    <p>Sea cual sea tu objetivo, la
                        razón por la que empezaste
                        es la que nos importa. </p>
                </div>
            </li>
            <li class="flex-item black-force">
                <img src="../../img/reto/2.png" alt="emprendimiento"/>
                <div class="disciplinas">
                    <h4 class="title-disciplina title-force">Disciplina</h4>
                    <p>Te acompañamos en el
                        proceso de llegar a tus
                        resultados, paso a paso. </p>
                </div>
            </li>
            <li class="flex-item black-force">
                <img src="../../img/reto/3.png" alt="corporacion"/>
                <div class="disciplinas">
                    <h4 class="title-disciplina title-force">Resultados</h4>
                    <p>Llega hasta donde quieres
                        llegar y sobrepasa tus límites. </p>
                </div>
            </li>
        </ul>
    </div>
    <div class="banner-force">
        <div class="container">
        <ul class="flex-container">
            <li class="flex-item t-force">
                <div class="disciplinas">
                    <h4 class="title-disciplina title-force num-force">5</h4>
                    <hr class="separator-force">
                    <p class="force-cc">DÍAS</p>
                </div>
            </li>
            <li class="flex-item t-force">
                <div class="disciplinas">
                    <h4 class="title-disciplina title-force num-force">45</h4>
                    <hr class="separator-force">
                    <p class="force-cc">MINUTOS AL DIA</p>
                </div>
            </li>
            <li class="flex-item t-force">
                <div class="disciplinas">
                    <h4 class="title-disciplina title-force num-force">2</h4>
                    <hr class="separator-force">
                    <p class="force-cc">TIPOS DE ENTRENAMIENTO</p>
                </div>
            </li>
        </ul>
        </div>
    </div>
    <div class="container">
        <hr class="red-force">
        <h2 class="evento-title evento-force time-force">ESCOGE TU HORARIO</h2>
        <ul class="flex-container">
            <li class="flex-item black-force gray-force">
                <img src="../../img/reto/rayo.png" alt="innovacion"/>
                <hr class="separator-force-red">
                <div class="disciplinas">
                    <p class="text-force-d">Para los fighters que
                        quieren empezar bien
                        el día
                    </p>
                    <img src="../../img/reto/am.png" alt="emprendimiento" class="time-img"/>
                </div>
            </li>
            <li class="flex-item black-force gray-force">
                <img src="../../img/reto/puno.png" alt="emprendimiento"/>
                <hr class="separator-force-red">
                <div class="disciplinas">
                    <p class="text-force-d">Para los fighters que dan
                        la milla extra al terminar
                        el día </p>
                    <img src="../../img/reto/pm.png" alt="emprendimiento" class="time-img"/>
                </div>
            </li>
        </ul>
    </div>
    <div style="background: #F6F6F6; ">
    <div class="container" style="padding-top: 20px;">
        <hr class="red-force">
        <h2 class="evento-title evento-force time-force">PRECIOS</h2>
        <img src="../../img/reto/tabla.png" alt="emprendimiento" class="time-img"/>
    </div>
    </div>
@endsection
