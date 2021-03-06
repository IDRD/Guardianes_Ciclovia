@extends('master')

@section('content')

    <?php


    preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
    if (count($matches) < 2) {
        preg_match('/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
    }

    if (count($matches) > 1) {
        //Then we're using IE
        $version = $matches[1];

        switch (true) {
            case ($version <= 8):
                echo ':( Tu navegador IE no es compatible por favor utiliza firefox o chrome';
                exit();
                break;

            case ($version == 9 || $version == 10):
                //IE9 & IE10!
                echo ':( Tu navegador IE no es compatible por favor utiliza firefox o chrome';
                exit();
                break;

            case ($version == 11):
                //Version 11!
                echo ':( Tu navegador IE no es compatible por favor utiliza firefox o chrome';
                exit();
                break;

            default:
                //You get the idea
        }
    }

    ?>

    <style>

        input[type="radio"], input[type="checkbox"] {
            margin: 7px 0 0;
            margin-top: 1px \9;
            line-height: normal;
            width: 18px;
        }
        .ficheros {
            background: rgb(48, 164, 231);
            padding: 10px;
            border-radius: 29px;
            font-weight: bolder;
            color: white;
            box-shadow: 4px 7px 31px rgba(136, 136, 136, 0.6);
        }

        .freebirdFormviewerViewItemsPagebreakDescriptionText {
            font-size: 10px !important;
            color: gray;
        }


        .titulos_seccion {
            position: relative;
            background-color: rgb(0, 66, 101);
            color: white;
            font-weight: bolder;
            margin: 12px;
            height: 34px;
            padding: 8px;
            width: 95%;
        }

        .titulos_seccion:after{
            content: '';
            position: absolute;
            width: 30px;
            height: 100%;
            right: -12px;
            background-color: #004265;
            top: 0;
            transform: skew(-211deg);
        }

        .panel-default>.panel-heading {
            color: #ffffff;
            background-color: #004265;
            border-color: #004265;
            font-weight: bolder;
            text-transform: uppercase;
        }

        .panel-default>.panel-heading :after{
            content: '';
            position: absolute;
            width: 30px;
            height: 100%;
            right: -12px;
            background-color: #004265;
            top: 0;
            transform: skew(-211deg);
        }

        .freebirdHeaderMast {
            background-image: url(https://lh3.googleusercontent.com/sZwhPqe-QvMtgcXvqaUbTZ2oCSg1TovOmIs9H8VjzVOSKOk7b281XrMgyjHyF0vPWNtuATaXzg=w1042);
            background-size: cover;
            background-position: center;
            color: rgba(255, 255, 255, 1);
            position: absolute;
            top: 0px;
            width: 100%;
            height: 250px;
            z-index: -14;
            left: 0px;
        }

        form#form_gen {
            -webkit-box-shadow: 10px 10px 5px 0px rgba(146, 143, 143, 0.35);
            -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
            box-shadow: 15px 20px 52px 0px rgba(0, 0, 0, 0.17);
        }
    </style>

    <script>
        var paises = JSON.parse("{{json_encode($paises)}}".replace(/&quot;/g, '"'));
        var ciudades = JSON.parse("{{json_encode($ciudades)}}".replace(/&quot;/g, '"'));
        var departamentos = JSON.parse("{{json_encode($departamentos)}}".replace(/&quot;/g, '"'));
        var localidades = JSON.parse("{{json_encode($localidades)}}".replace(/&quot;/g, '"'));

        $(function() {

            $('.date').datetimepicker({ format: 'Y-m-d'});
            $('#id_pais').empty();
            $('#id_pais').append($('<option>').text("Seleccione"));

            $('#id_localidad').empty();
            $('#id_localidad').append($('<option>').text("Seleccione"));

            $.each(localidades, function (i, obj) {
                $('#id_localidad').append($('<option>').text(obj.Nombre_Localidad).attr('value', obj.Id_Localidad));
            });

            $('#id_pais_nacimiento').empty();
            $('#id_pais_nacimiento').append($('<option>').text("Seleccione"));

            $.each(paises, function (i, obj) {
                $('#id_pais').append($('<option>').text(obj.Nombre_Pais).attr('value', obj.Id_Pais));
                $('#id_pais_nacimiento').append($('<option>').text(obj.Nombre_Pais).attr('value', obj.Id_Pais));
            });

            $('#id_pais').change(function(){
                var pais = $(this).val();
                var ciudades_filtro  =  ciudades.filter(function(ciudad){
                    return ciudad.Id_Pais == pais
                });
                $.each(ciudades_filtro, function (i, obj) {
                    $('#id_ciudad').append($('<option>').text(obj.Nombre_Ciudad).attr('value', obj.Id_Ciudad));
                });

                if($.trim($('#id_ciudad').data('value')))
                {
                    $('#id_ciudad').val($('#id_ciudad').data('value')).trigger('change');
                }
            });

            $('#id_pais_nacimiento' ).change(function(){
                var pais = $(this).val();
                var ciudades_filtro  =  ciudades.filter(function(ciudad){
                    return ciudad.Id_Pais == pais
                });
                $.each(ciudades_filtro, function (i, obj) {
                    $('#id_ciudad_nacimiento').append($('<option>').text(obj.Nombre_Ciudad).attr('value', obj.Id_Ciudad));
                });
                if($.trim($('#id_ciudad_nacimiento').data('value')))
                {
                    $('#id_ciudad_nacimiento').val($('#id_ciudad_nacimiento').data('value')).trigger('change');
                }
            });

            $.each(departamentos, function (i, obj) {
                $('#id_departamento').append($('<option>').text(obj.Nombre_Departamento).attr('value', obj.Id_Departamento));
                $('#id_departamento_nacimiento').append($('<option>').text(obj.Nombre_Departamento).attr('value', obj.Id_Departamento));
            });


        });



    </script>
    <?php

    date_default_timezone_set('America/Bogota');
    $today = date("Y-m-d H:i:s");
    $date = "2017-09-31 23:59:00";

    //if ( $today > $date && empty($usuario) ) {
    if ( false ) {


    ?>

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">

    <h1 style="font-family: 'Noto Sans', sans-serif;">Inscripción cerrada</h1>

    <?php

    }else{
    ?>
    <input type="hidden" name="url" value="{{url('/')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/Css/form.css?n=10')}}">
    <div class="freebirdFormviewerViewFormBanner freebirdHeaderMast"></div>
    @if(!empty($error))
        <div class="alert alert-danger">
            <strong>Errror!</strong> {{$error}}
        </div>
    @endif

    <form method="POST" action="{{route('insertar')}}" id="form_gen" enctype="multipart/form-data">
        <input type="hidden" id="editar" name="editar"
               value={{(!empty($usuario)?url_segura('encapsular',$usuario->id):'')}} >
        {{ csrf_field() }}
        <div class="panel panel-default">
            <div class="panel-heading"> {{(!empty($usuario)?'Bienvenido de nuevo usuario : '.$usuario->nombres.' '.$usuario->apellido:'Datos Básicos y de contacto')}}</div>
            <div class="panel-body">

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Documento de
                        identidad <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <input title="Se necesita una cedula" required type="number" class="form-control" id="cedula"
                           name="cedula" value={{(!empty($usuario)?$usuario->cedula:old('cedula'))}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">Tipo de
                        documento <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Seleccione de acuerdo a su documento
                    </label>
                    <select name="tipo_documento" id="tipo_documento" class="form-control" data-value="{{ !empty($usuario) ? $usuario->tipo_documento  : old('tipo_documento') }}">
                        <option value="1" >
                            Cédula de Ciudadania
                        </option>
                        <option value="2" >
                            Cédula de Extranjeria
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">Nombres <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Diligenciar en MAYÚSCULA y tal cual como aparece en el documento de identidad
                    </label>
                    <input required type="text" class="form-control" id="nombres" name="nombres" value={{(!empty($usuario)?$usuario->nombres:old('nombres'))}}  >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">Apellidos <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Diligenciar en MAYÚSCULA y tal cual como aparece en el documento de identidad
                    </label>
                    <input required type="text" class="form-control" id="apellidos" name="apellidos"
                           value={{!empty($usuario)?$usuario->apellidos:old('apellidos')}} >
                </fieldset>


                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">CorreoElectrónico</label><span
                            style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Diligencie la información del correo es necesario que sea gmail
                    </label>
                    <input required type="email" class="form-control" id="mail" name="mail"
                           value={{(!empty($usuario)?($usuario->mail):old('mail'))}}>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">
                        FECHA DE NACIMIENTO <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Seleccione de acuerdo a la fecha de nacimiento en su cedula
                    </label>
                    <input required type="text" class="date form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                           value={{(!empty($usuario)?($usuario->fecha_nacimiento):old('fecha_nacimiento'))}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">Selecciona
                        Pais</label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Seleccione Tu pais de Residencia <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <select name="id_pais" id="id_pais" class="form-control" data-value="{{(!empty($usuario)?($usuario->id_pais):old('id_pais'))}}">
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">Selecciona
                        Departamento</label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Seleccione Tu Departamento de Residencia <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <select name="id_departamento" id="id_departamento" class="form-control">

                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">Selecciona
                        Ciudad/municipio</label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Seleccione Tu Ciudad de Residencia <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <select name="id_ciudad" id="id_ciudad" class="form-control">

                    </select>
                </fieldset>


                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">
                        Localidad <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Seleccione la localidad de residencia a la cual corresponde la dirección digitada
                    </label>
                    <select name="id_localidad" id="id_localidad" class="form-control">

                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">
                        Barrio de Residencia <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label><br>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Por favor escribir el barrio de la dirección digitada anteriormente
                    </label>
                    <input required type="text" class="form-control" id="barrio" name="barrio" id="barrio"
                           value={{(!empty($usuario)?($usuario->barrio):'')}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">
                        Telefono de contacto <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label><br>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Por favor escribir el telefono de contacto
                    </label>
                    <input required type="text" class="form-control" id="telefono" name="telefono" id="telefono"
                           value={{(!empty($usuario)?($usuario->telefono):'')}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Direccion <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Colocar la información correspondiente y completa a su sitio de residencia actual (ser lo más
                        exactos - Interior, Bloque, Apartamento, Torre, etc)
                    </label>
                    <input required type="text" class="form-control" id="direccion" name="direccion"
                           value={{(!empty($usuario)?($usuario->direccion):'')}} >
                </fieldset>

            </div>
        </div>
        </section>


        <div class="panel panel-default">
            <div class="panel-heading">Datos personales</div>
            <div class="panel-body">

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">Estado
                        civil<span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <select required name="estado_civil" id="estado_civil" class="form-control" data-value="{{ !empty($usuario) ? $usuario->estado_civil  : old('estado_civil') }}">
                        <option value="">Elige</option>
                        <option value="Soltero" {{(!empty($usuario)?($usuario->estado_civil == 'Soltero' ? 'selected' : ''):'')}}>
                            Soltero
                        </option>
                        <option value="Casado" {{(!empty($usuario)?($usuario->estado_civil == 'Casado' ? 'selected' : ''):'')}}>
                            Casado
                        </option>
                        <option value="Separado" {{(!empty($usuario)?($usuario->estado_civil == 'Separado' ? 'selected' : ''):'')}}>
                            Separado
                        </option>
                        <option value="Divorciado" {{(!empty($usuario)?($usuario->estado_civil == 'Divorciado' ? 'selected' : ''):'')}}>
                            Divorciado
                        </option>
                        <option value="Unión libre" {{(!empty($usuario)?($usuario->estado_civil == 'Unión libre' ? 'selected' : ''):'')}}>
                            Unión libre
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">
                        Sexo <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Seleccione su género
                    </label>
                    <select required name="sexo" id="sexo" class="form-control" data-value="{{ !empty($usuario) ? $usuario->sexo  : old('sexo') }}" >
                        <option value="">Seleccione</option>
                        <option value="Masculino">
                            Masculino
                        </option>
                        <option value="Femenino">
                            Femenino
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">País de
                        nacimiento <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <select name="id_pais_nacimiento" id="id_pais_nacimiento" class="form-control" data-value="{{(!empty($usuario)?($usuario->id_pais_nacimiento):old('id_pais_nacimiento'))}}">
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">Departamento de
                        nacimiento<span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <select name="id_departamento_nacimiento" id="id_departamento_nacimiento" class="form-control">

                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">Selecciona
                        Ciudad/municipio <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <select name="id_ciudad_nacimiento" id="id_ciudad_nacimiento" class="form-control">

                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">Selecciona
                        Si eligió otra ciudad o municipio, por favor escribir cual
                        <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>

                    <input type="text" name="otra_ciudad" id="otra_ciudad" class="form-control">
                </fieldset>

                <fieldset class="form-group col-sm-6" id="datos-militar">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">Tiene situación
                        Militar definida? <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Por favor seleccionar SI (tiene la tarjeta militar) y No (si esta en proceso por algún motivo)
                    </label>
                    <select name="situacion_militar" id="situacion_militar" class="form-control"  data-value="{{ !empty($usuario )? $usuario->situacion_militar  : old('situacion_militar') }}">
                        <option value="Si" >Si</option>
                        <option value="No" >No</option>
                    </select>

                </fieldset>


                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">
                        Se reconoce como parte de una población focalizada <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        Grupo Étnico; Personas con discapacidad; Víctimas del conflicto armado; Personas en proceso de
                        reintegración, entre otros
                    </label>
                    <select required name="reconoce" id="reconoce" class="form-control" data-value="{{ !empty($usuario )? $usuario->reconoce  : old('reconoce') }}">
                        <option value="">Seleccione</option>
                        <option value="Si" >
                            Si
                        </option>
                        <option value="No" >
                            No
                        </option>

                    </select>
                </fieldset>


                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">
                        Grupo étnico <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>

                    <select required name="comunidades" id="comunidades" class="form-control" data-value="{{ !empty($usuario )? $usuario->comunidades  : old('comunidades') }}">
                        <option value="">Seleccione</option>
                        <option value="Ninguna" >
                            Ninguna
                        </option>
                        <option value="Afrocolombiano" >
                            Afrocolombiano
                        </option>
                        <option value="LGBTI" >
                            Indigenas
                        </option>
                        <option value="Negros" >
                            Negros
                        </option>
                        <option value="Palenqueros" >
                            Palenqueros
                        </option>
                        <option value="Raizales" >
                            Raizales
                        </option>
                        <option value="Rrom" >
                            Rrom
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6" id="datos-militar">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">Tipo población
                        focalizada <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                    </label>
                    <select required name="tipo_poblacion" id="tipo_poblacion" class="form-control" data-value="{{ !empty($usuario )? $usuario->tipo_poblacion  : old('tipo_poblacion') }}" >
                        option value="">Seleccione</option>
                        <option value="Ninguna" >
                            Ninguna
                        </option>
                        <option value="Personas en proceso de reintegración" >
                            Personas en proceso de reintegración
                        </option>
                        <option value="LGBTI" >
                            Personas en discapacidad
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2" >
                        Condición de discapacidad<span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>

                    <select required name="condicion" id="condicion" class="form-control" data-value="{{ !empty($usuario )? $usuario->condicion  : old('condicion') }}" >
                        <option value="">Seleccione</option>
                        <option value="Ninguna"  >
                            Ninguna
                        </option>
                        <option value="Auditiva" >
                            Auditiva
                        </option>
                        <option value="Cognitiva o intelectual" >
                            Cognitiva o intelectual
                        </option>
                        <option value="Fisica" >
                            Fisica
                        </option>
                        <option value="Fisica" >
                            Mental
                        </option>
                        <option value="Psicosocial" >
                            Psicosocial
                        </option>
                        <option value="Sordoceguera" >
                            Sordoceguera
                        </option>
                        <option value="Visual" >
                            Visual
                        </option>
                        <option value="Múltiple" >
                            Múltiple
                        </option>
                    </select>
                </fieldset>

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">NIVEL EDUCATIVO</div>
            <div class="panel-body">
                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">
                        Nivel de estudio <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <select required name="nivel_educativo" id="nivel_educativo" class="form-control"  data-value="{{ !empty($usuario )? $usuario->nivel_educativo  : old('nivel_educativo') }}" >
                        <option value="Elige" >
                            Elige
                        </option>
                        <option value="Ninguno" >
                            Ninguno
                        </option>
                        <option value="Preescolar" >
                            Preescolar
                        </option>
                        <option value="Básica primaria (2-4)" >
                            Básica primaria (2-4)
                        </option>
                        <option value="Básica secundaria (7-8)" >
                            Básica secundaria (7-8)
                        </option>
                        <option value="Media (11-12)" >
                            Media (11-12)
                        </option>
                        <option value="Técnica laboral" >
                            Técnica laboral
                        </option>
                        <option value="Técnica profesional" >
                            Técnica profesional
                        </option>
                        <option value="Tecnológica" >
                            Tecnológica
                        </option>
                        <option value="Universitaria" >
                            Universitaria
                        </option>
                        <option value="Especialización" >
                            Especialización
                        </option>
                        <option value="Maestría" >
                            Maestría
                        </option>
                        <option value="Doctorado" >
                            Doctorado
                        </option>
                    </select>
                </fieldset>
                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">
                        Estado de escolaridad <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <select required name="escolaridad" id="escolaridad" class="form-control"  data-value="{{ !empty($usuario )? $usuario->escolaridad  : old('escolaridad') }}">
                        <option value="Elige">
                            Elige
                        </option>
                        <option value="Ninguno">
                            Ninguno
                        </option>
                        <option value="En curso">
                            En curso
                        </option>
                        <option value="Incompleto">
                            Incompleto
                        </option>
                        <option value="Graduado">
                            Graduado
                        </option>
                    </select>
                </fieldset>
                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput2">
                        Fecha de culminación de estudio más alto <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span>
                    </label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        En caso de no tener la fecha dejar en blanco
                    </label>
                    <input type="text" class="date form-control" id="fecha_estudio" name="fecha_estudio"
                           value={{(!empty($usuario)?($usuario->fecha_estudio):old('fecha_estudio'))}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Titulo
                        obtenido </label>
                    <input type="text" class="form-control" id="titulo_obtenido" name="titulo_obtenido"
                           value={{(!empty($usuario)?($usuario->titulo_obtenido):old('titulo_obtenido'))}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Institución
                        <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <input type="text" class="form-control" id="institucion_titulo_obtenido"
                           name="institucion_titulo_obtenido"
                           value={{(!empty($usuario)?($usuario->institucion_titulo_obtenido):old('institucion_titulo_obtenido'))}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Número de
                        tarjeta profesional </label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">
                        En caso de no tener tarjeta profesional, dejar el campo vacío
                    </label>
                    <input type="text" class="form-control" id="targeta_profesional" name="targeta_profesional"
                           value={{(!empty($usuario)?($usuario->targeta_profesional):old('targeta_profesional'))}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Tiene practica
                        laboral <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span</label>
                    <select name="practica_laboral_select" id="practica_laboral" class="form-control"  data-value="{{ !empty($usuario )? $usuario->practica_laboral_select  : old('practica_laboral_select') }}" >
                        <option value="Si" > Si </option>
                        <option value="No" > No </option>
                    </select>
                </fieldset>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">EXPERIENCIAS LABORALES</div>
            <div class="panel-body">

                <div class="titulos_seccion col-sm-12">EXPERIENCIA LABORAL 1</div>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Tipo de
                        experiencia laboral 1<span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <select name="practica_laboral[0]" id="practica_laboral" class="form-control"  data-value="{{ !empty($usuario )? json_decode($usuario->practica_laboral)[0]  : old('practica_laboral')[0] }}">
                        <option value="Elige"  >
                            Elige
                        </option>
                        <option value="Asalariado"  >
                            Asalariado
                        </option>
                        <option value="Independiente"  >
                            Independiente
                        </option>
                        <option value="Pasantía o práctica laboral"  >
                            Pasantía o práctica laboral
                        </option>
                    </select>
                </fieldset>


                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Nombre de la
                        empresa 1 </label>
                    <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa[0]"
                           value={{(!empty($usuario)?(json_decode($usuario->nombre_empresa)[0]):old('nombre_empresa')[0])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Sector 1</label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">Actividad
                        de la empresa</label>
                    <input type="text" class="form-control" id="sector_empresa" name="sector_empresa[0]"
                           value={{(!empty($usuario)?(json_decode($usuario->sector_empresa)[0]):old('sector_empresa')[0])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Teléfono de la
                        empresa 1</label>
                    <input type="text" class="form-control" id="telefono_empresa" name="telefono_empresa[0]"
                           value={{(!empty($usuario)?(json_decode($usuario->telefono_empresa)[0]):old('telefono_empresa')[0])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Fecha de inicio
                        1</label><label class="freebirdFormviewerViewItemsPagebreakDescriptionText"
                                        style="font-size:15px">Fecha
                    </label>
                    <input type="text" class="date form-control" id="fecha_inicio" name="fecha_inicio[0]"
                           value={{(!empty($usuario)?(json_decode($usuario->fecha_inicio)[0]):old('fecha_inicio')[0])}} >
                </fieldset>


                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Fecha de
                        finalización 1</label><label class="freebirdFormviewerViewItemsPagebreakDescriptionText"  style="font-size:15px">
                    </label>
                    <input type="text" class="date form-control" id="fecha_inicio" name="fecha_final[0]"
                           value={{(!empty($usuario)?(json_decode($usuario->fecha_final)[0]):old('fecha_final')[0])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Cargo 1</label>
                    <input type="text" class="form-control" id="cargo" name="cargo[0]"
                           value={{(!empty($usuario)?(json_decode($usuario->fecha_final)[0]):old('cargo')[0])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Área de trabajo
                        1</label>
                    <input type="text" class="form-control" id="area_trabajo" name="area_trabajo[0]"
                           value={{(!empty($usuario)?(json_decode($usuario->area_trabajo)[0]):old('area_trabajo')[0])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Funciones y
                        logros
                        1</label>
                    <input type="text" class="form-control" id="funciones" name="funciones[0]"
                           value={{(!empty($usuario)?(json_decode($usuario->funciones)[0]):old('funciones')[0])}} >
                </fieldset>


                <div class="titulos_seccion col-sm-12"> EXPERIENCIA LABORAL 2</div>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Tipo de
                        experiencia laboral 2<span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span</label>
                    <select name="practica_laboral[1]" id="practica_laboral" class="form-control"  data-value="{{ !empty($usuario )? json_decode($usuario->practica_laboral)[1]  : old('practica_laboral')[1] }}">
                        <option value="Elige"  >
                            Elige
                        </option>
                        <option value="Asalariado"  >
                            Asalariado
                        </option>
                        <option value="Independiente"  >
                            Independiente
                        </option>
                        <option value="Pasantía o práctica laboral"  >
                            Pasantía o práctica laboral
                        </option>
                    </select>
                </fieldset>


                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Nombre de la
                        empresa 2 </label>
                    <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa[1]"
                           value={{(!empty($usuario)?($usuario->nombre_empresa[1]):old('nombre_empresa')[1])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Sector 2</label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">Actividad
                        de la empresa</label>
                    <input type="text" class="form-control" id="sector_empresa" name="sector_empresa[1]"
                           value={{(!empty($usuario)?($usuario->sector_empresa[1]):old('sector_empresa')[1])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Teléfono de la
                        empresa 2</label>
                    <input type="text" class="form-control" id="telefono_empresa" name="telefono_empresa[1]"
                           value={{(!empty($usuario)?($usuario->telefono_empresa[1]):old('telefono_empresa')[1])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Fecha de inicio
                        2</label><label class="freebirdFormviewerViewItemsPagebreakDescriptionText"
                                        style="font-size:15px">Fecha
                    </label>
                    <input type="text" class="date form-control" id="fecha_inicio" name="fecha_inicio[1]"
                           value={{(!empty($usuario)?($usuario->fecha_inicio[1]):old('fecha_inicio')[1])}} >
                </fieldset>


                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Fecha de
                        finalización 2</label><label class="freebirdFormviewerViewItemsPagebreakDescriptionText"
                                                     style="font-size:15px">Fecha
                    </label>
                    <input type="text" class="date form-control" id="fecha_inicio" name="fecha_final[1]"
                           value={{(!empty($usuario)?($usuario->fecha_final[1]):old('fecha_final')[1])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Cargo 2</label>
                    <input type="text" class="form-control" id="cargo" name="cargo[1]"
                           value={{(!empty($usuario)?($usuario->fecha_final[1]):old('cargo')[1])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Área de trabajo
                        2</label>
                    <input type="text" class="form-control" id="area_trabajo" name="area_trabajo[1]"
                           value={{(!empty($usuario)?($usuario->area_trabajo[1]):old('area_trabajo')[1])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Funciones y
                        logros
                        2</label>
                    <input type="text" class="form-control" id="funciones" name="funciones[1]"
                           value={{(!empty($usuario)?json_decode($usuario->funciones[1]):old('funciones')[1])}} >
                </fieldset>

                <div class="titulos_seccion col-sm-12">OTROS CONOCIMIENTOS Y HABILIDADES</div>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Mencione
                        brevemente conocimientos o habilidades que tiene.</label>
                    <textarea class="form-control" id="conocimientos_habilidades" name="conocimientos_habilidades">{{(!empty($usuario)?($usuario->conocimientos_habilidades):old('conocimientos_habilidades'))}}</textarea>
                </fieldset>

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">EDUCACIÓN INFORMAL</div>
            <div class="panel-body">

                <div class="titulos_seccion col-sm-12">EDUCACIÓN INFORMAL</div>

                <div class="col-sm-12">Referenciar las dos últimas o más
                    representativas capacitaciones o certificaciones, en dado caso de no contar con ellas, dejar los
                    campos
                    en blanco.
                </div>

                <div class="titulos_seccion col-sm-12">CAPACITACIÓN O CERTIFICACIÓN No 1</div>





                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Tipo de
                        capacitación
                        o certificación 1</label>
                    <select name="tipo_certificacion[0]" id="tipo_certificacion" class="form-control"  data-value="{{!empty( $usuario) ? json_decode($usuario->tipo_certificacion)[0]  : old('tipo_certificacion')[0] }}">
                        <option value="Elige">
                            Elige
                        </option>
                        <option value="Curso">
                            Curso
                        </option>
                        <option value="Taller">
                            Taller
                        </option>
                        <option value="Diplomado">
                            Diplomado
                        </option>
                        <option value="Seminario">
                            Seminario
                        </option>
                        <option value="Certificación de competencias">
                            Certificación de competencias
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Nombre del
                        programa
                        1</label>
                    <input type="text" class="form-control" id="nombre_certificacion" name="nombre_certificacion[0]"
                           value={{(!empty($usuario)?($usuario->nombre_certificacion[0]):old('nombre_certificacion')[0])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Estado 1</label>
                    <select name="estado_certificacion[0]" id="estado_certificacion" class="form-control" data-value={{(!empty($usuario)?json_decode($usuario->estado_certificacion)[0]:old('estado_certificacion')[0])}} >
                        <option value="Certificado">
                            Certificado
                        </option>
                        <option value="No certificado">
                            No certificado
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Duración en
                        horas
                        1</label>
                    <input type="text" class="form-control" id="duracion_certificacion" name="duracion_certificacion[0]"
                           value={{(!empty($usuario)?($usuario->duracion_certificacion[0]):old('duracion_certificacion')[0])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Nombre de la
                        Institución 1</label>
                    <input type="text" class="form-control" id="institucion_certificacion" name="institucion_certificacion[0]" value={{(!empty($usuario)?json_decode($usuario->institucion_certificacion)[0]:old('institucion_certificacion')[0])}} >
                </fieldset>
                <div class="titulos_seccion col-sm-12">CAPACITACIÓN O CERTIFICACIÓN No 2</div>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Tipo de
                        capacitación o certificación 1</label>
                    <select name="tipo_certificacion[1]" id="tipo_certificacion" class="form-control" data-value={{(!empty($usuario)?json_decode($usuario->tipo_certificacion)[0]:old('tipo_certificacion')[1])}} >
                        <option value="Elige" >
                            Elige
                        </option>
                        <option value="Curso" >
                            Curso
                        </option>
                        <option value="Taller" >
                            Taller
                        </option>
                        <option value="Diplomado" >
                            Diplomado
                        </option>
                        <option value="Seminario" >
                            Seminario
                        </option>
                        <option value="Certificación de competencias" >
                            Certificación de competencias
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Nombre del programa 1</label>
                    <input type="text" class="form-control" id="nombre_certificacion" name="nombre_certificacion[1]" value={{(!empty($usuario)?json_decode($usuario->nombre_certificacion)[1]:old('nombre_certificacion')[1])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Estado 1</label>
                    <select name="estado_certificacion[1]" id="estado_certificacion" class="form-control" data-value={{(!empty($usuario)?json_decode($usuario->estado_certificacion)[1]:old('estado_certificacion')[1])}} >
                        <option value="Certificado" >
                            Certificado
                        </option>
                        <option value="No certificado" >
                            No certificado
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Duración en
                        horas
                        1</label>
                    <input type="text" class="form-control" id="duracion_certificacion" name="duracion_certificacion[1]" value={{(!empty($usuario)?json_decode($usuario->duracion_certificacion)[1]:old('duracion_certificacion')[1])}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Nombre de la
                        Institución
                        1</label>
                    <input type="text" class="form-control" id="institucion_certificacion" name="institucion_certificacion[1]" value={{(!empty($usuario)?json_decode($usuario->institucion_certificacion)[1]:old('institucion_certificacion')[1])}} >
                </fieldset>

                <div class="titulos_seccion col-sm-12">OTROS CONOCIMIENTOS Y HABILIDADES</div>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Mencione
                        brevemente
                        conocimientos o habilidades que tiene.</label>
                    <textarea class="form-control" id="conocimientos_habilidades_certificacion" name="conocimientos_habilidades_certificacion">{{(!empty($usuario)?($usuario->conocimientos_habilidades_certificacion):old('conocimientos_habilidades_certificacion'))}}</textarea>
                </fieldset>

                <div class="titulos_seccion col-sm-12">PERFIL LABORAL</div>

                <fieldset class="form-group col-sm-12">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Mencione su perfil laboral</label>
                    <textarea class="form-control" id="perfil_laboral" name="perfil_laboral">{{(!empty($usuario)?($usuario->perfil_laboral):old('perfil_laboral'))}}</textarea>
                </fieldset>

                <fieldset class="form-group col-sm-12">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Aspiración Salarial</label>
                    <input type="number" class="form-control" id="aspiracion_salarial" name="aspiracion_salarial" value={{(!empty($usuario)?($usuario->aspiracion_salarial):old('aspiracion_salarial'))}} >
                </fieldset>

                <fieldset class="form-group col-sm-12">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Posibilidad de
                        viajar
                        <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <select required name="posibilidad_viajar" id="posibilidad_viajar" class="form-control" data-value="{{!empty($usuario )?($usuario->posibilidad_viajar):old('posibilidad_viajar') }}">
                        <option value="Si" >
                            Si
                        </option>
                        <option value="No" >
                            No
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-12">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Interés en ofertas de teletrabajo
                        <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <select required name="teletrabajo" id="teletrabajo" class="form-control" data-value="{{ !empty($usuario )? $usuario->teletrabajo  : old('teletrabajo') }}">
                        <option value="Si" >
                            Si
                        </option>
                        <option value="No" >
                            No
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-12">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Situación laboral actual
                        <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>
                    <select required name="situacion_laboral" id="situacion_laboral" class="form-control" data-value="{{ !empty($usuario )? $usuario->situacion_laboral  : old('situacion_laboral') }}">
                        <option value="Desempleado">Desempleado</option>
                        <option value="Primer empleo">Primer empleo</option>
                        <option value="Empleado" >Empleado</option>
                        <option value="Independiente" >Independiente</option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-12">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Propiedad de medio de transporte
                    </label>
                    <select  name="propietario_transporte" id="propietario_transporte" class="form-control" data-value="{{ !empty($usuario )? $usuario->propietario_transporte  : old('propietario_transporte') }}">
                        <option value="Si" >
                            Si
                        </option>
                        <option value="No" >
                            No
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-12">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Licencia de conducción
                    </label>
                    <select  name="licencia_conducion" id="licencia_conducion" class="form-control" data-value="{{ !empty($usuario )? $usuario->licencia_conducion  : old('licencia_conducion') }}" >
                        <option value="No" >
                            No
                        </option>
                        <option value="Carro" >
                            Carro
                        </option>
                        <option value="Moto" >
                            Moto
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-12">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Categoría de la licencia de conducción</label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">En caso de no conocerla o no tenerla, dejar el campo en blanco.
                    </label>
                    <input type="text" class="form-control" id="categoria_licencia" name="categoria_licencia"
                           value={{(!empty($usuario)?($usuario->categoria_licencia):old('categoria_licencia'))}} >
                </fieldset>

                <fieldset class="form-group col-sm-12">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Intereses ocupacionales</label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">Un interés ocupacional es aquel que se relaciona con el desempeño de un trabajo. Así a una persona le puede interesar la Medicina o la Enfermería, porque dentro de sus valores está el ayudar a las personas. Una persona podría querer ser periodista, porque le gusta la comunicación y las relaciones con la sociedad. Son solo ejemplos.
                    </label>
                    <input type="text" class="form-control" id="intereses_ocupacionales" name="intereses_ocupacionales"
                           value={{(!empty($usuario)?($usuario->intereses_ocupacionales):old('intereses_ocupacionales'))}} >
                </fieldset>

            </div>
        </div>




        <div class="panel panel-default">
            <div class="panel-heading">IDIOMAS Y DIALECTOS</div>
            <div class="panel-body">

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Idiomas y dialectos No 1</label>

                    <input type="text" class="form-control" id="idioma" name="idioma[0]"
                           value={{(!empty($usuario)?(json_decode($usuario->idioma)[0]):old('idioma')[0])}} >
                </fieldset>


                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Nivel de idioma No 1 </label>
                    <select required name="idioma_nivel[0]" id="idioma_nivel" class="form-control" data-value="{{ !empty($usuario )? json_decode($usuario->idioma_nivel)[0]  : old('idioma_nivel')[0] }}" >
                        <option >1</option>
                        <option >2</option>
                        <option >3</option>
                        <option >4</option>
                    </select>
                </fieldset>


                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Idiomas y dialectos No 2</label>

                    <input type="text" class="form-control" id="idioma" name="idioma[1]"
                           value={{(!empty($usuario)?($usuario->idioma[1]):old('idioma')[1])}} >
                </fieldset>


                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Nivel de idioma No 2 </label>
                    <select required name="idioma_nivel[1]" id="idioma_nivel" class="form-control" data-value="{{ !empty($usuario )? json_decode($usuario->idioma_nivel)[1]  : old('idioma_nivel')[1] }}">
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                    </select>
                </fieldset>

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">CICLOVÍA</div>
            <div class="panel-body">
                <div class="col-sm-12">Esta sección, corresponde a preguntas enfocadas directamente con el rol a desempeñar como Aspirante a Guardián de Ciclovía, tómese el tiempo para leer, comprender y responder de acuerdo a sus intereses personales.
                </div>
                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Dispone de tiempo los días domingos y festivos entre las 6:00 am y las 4:00 pm</label>
                    <select  name="dispone_tiempo" id="dispone_tiempo" class="form-control" data-value="{{ !empty($usuario )? $usuario->dispone_tiempo : old('dispone_tiempo') }}">
                        <option value="Si" >Si</option>
                        <option value="No" >No</option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Esta dispuesto a cumplir con una presentación personal acorde a las directrices del IDRD</label>
                    <select  name="presentacion_personal" id="presentacion_personal" class="form-control" data-value="{{ !empty($usuario )? $usuario->presentacion_personal : old('presentacion_personal') }}">
                        <option value="Si" >Si</option>
                        <option value="No" >No</option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Comprende y acepta que inasistir reiteradamente a jornadas durante la etapa de preparación y acondicionamiento (justificadas e injustificadas), generan la exclusión del proceso
                    </label>
                    <select  name="comprende_acepta" id="comprende_acepta" class="form-control" data-value="{{ !empty($usuario )? $usuario->comprende_acepta : old('comprende_acepta') }}" >
                        <option value="Si"  >Si</option>
                        <option value="No"  >No</option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Cuenta con bicicleta todo terreno</label>
                    <label class="freebirdFormviewerViewItemsPagebreakDescriptionText" style="font-size:15px">No se permite bicicletas de ruta, urbanas y/o playeras con cambios adaptados. Por otro lado la bicicleta todo terreno permitida no debe tener parrilla.</label>
                    <select  name="bicicleta_todoterreno" id="bicicleta_todoterreno" class="form-control" data-value="{{ !empty($usuario )? $usuario->bicicleta_todoterreno : old('bicicleta_todoterreno') }}">
                        <option value="Si" >si</option>
                        <option value="No" >No</option>
                    </select>
                    </select>
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Se encuentra actualmente afiliado a un prestador del servicio del sistema de seguridad social en salud (Cotizante, beneficiario o dependiente). <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>

                    <select required name="afiliado" id="afiliado" class="form-control" data-value="{{ !empty($usuario )? $usuario->afiliado : old('afiliado') }}">
                        <option value="Si"  >Si</option>
                        <option value="No"  >No</option>
                        <option value="Otro"  >Otro</option>
                    </select>
                    <label>Si selecciono otro:</label>
                    <input  type="text" class="form-control" id="seguridad_social_otro" name="seguridad_social_otro"
                            value={{(!empty($usuario)?($usuario->seguridad_social_otro):'')}} >
                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Tiene algún antecedente de salud, física y/o psicológica que le impida realizar alguna actividad <span style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span></label>

                    <select required name="antecedente_salud" id="antecedente_salud" class="form-control"  data-value="{{ !empty($usuario )? $usuario->antecedente_salud : old('antecedente_salud') }}" >
                        <option value="Si" >Si</option>
                        <option value="No" >No</option>

                    </select>

                </fieldset>

                <fieldset class="form-group col-sm-6">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">Si su respuesta es afirmativa, indique el antecedente</label>

                    <input  type="text" class="form-control" id="opcional_antecedente" name="opcional_antecedente" value={{(!empty($usuario)?($usuario->opcional_antecedente):old('opcional_antecedente'))}} >
                </fieldset>

                <div class="titulos_seccion col-sm-12">AVISO DE AUTORIZACIÓN PARA TRATAMIENTO DE DATOS PERSONALES</div>

                <div class="col-sm-12" style="text-align: justify">El uso y acceso al aplicativo del Sistema de Información del Servicio Público de Empleo –SISE- está sujeto a los siguientes "Términos y Condiciones de Uso" que reglamentan las políticas frente al tratamiento de la información que reposa en las bases de datos del aplicativo del Servicio Público de Empleo, en adelante SPE. Para hacer uso de este Servicio, usted deberá leer atentamente estas condiciones y declarar su acuerdo diligenciando la casilla “Acepto los Términos y Condiciones” que aparecen al finalizar este texto. En caso de que no señale dicha casilla o no acepte estas condiciones, no podrá utilizar este Sitio Web. Al utilizar este Sitio Web, usted declara la aceptación del tratamiento de la información que cargue al mismo, con el propósito que la misma circule y sea compartida para efectos de
                    intermediación laboral. Los alcances de dicha intermediación se detallan más adelante. El SPE podrá revisar estos Términos y Condiciones de Uso en cualquier momento, actualizando su contenido. Usted deberá visitar esta página cada vez que acceda al Sitio para revisar los Términos y Condiciones de Uso, en cuanto son vinculantes.
                </div>


                <fieldset class="form-group col-sm-6">
                    <input required type="radio" class="form-control col-sm-2" id="acepto_terminos" name="acepto_terminos" value={{(!empty($usuario)?($usuario->acepto_terminos):old('acepto_terminos'))}} >
                    <label style="padding-top: 15px;" class="freebirdFormviewerViewItemsItemItemTitle col-sm-10" for="formGroupExampleInput">Acepto términos y condiciones<span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span </label>


                </fieldset>


                <fieldset class="form-group col-sm-12">
                    <label class="freebirdFormviewerViewItemsItemItemTitle" for="formGroupExampleInput">FIRMA <span
                                style="color: red;font-size: 13px;text-transform: capitalize;color:red">*</span</label>

                    <input required type="text" class="form-control col-sm-4" id="firma" name="firma" value={{(!empty($usuario)?($usuario->firma):old('firma'))}} >
                </fieldset>


                <input type="submit" class="form-control btn btn-success" value="Registrarse" >

            </div>
        </div>


    </form>
    <?php } ?>
    <script type="text/javascript" src="{{asset('public/Js/form.js')}}"></script>

    @if(!empty($usuario))
        <script>

            setTimeout(function () {

                $('select[name=id_pais]').val('{{$usuario->id_pais}}');
                $('select[name=id_departamento]').val('{{$usuario->id_departamento}}');
                $('select[name=id_ciudad]').val('{{$usuario->id_ciudad}}');

            }, 3000);
        </script>

    @endif
@stop

