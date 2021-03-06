<!DOCTYPE html>



<html lang="es">
  <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <link rel="stylesheet" href="../../../Plantilla_Base/Presentacion/Css/bootstrap.min.css" />
      @section('style')
      <!-- bower:css -->
      <link rel="stylesheet" href="public/bower_components/datatables.net-buttons-dt/css/buttons.dataTables.css" />
      <link rel="stylesheet" href="public/bower_components/datatables.net-dt/css/jquery.dataTables.css" />
      <link rel="stylesheet" href="public/bower_components/datetimepicker/jquery.datetimepicker.css" />
      <link rel="stylesheet" href="public/bower_components/bootstrap-select/dist/css/bootstrap-select.css" />
      <link rel="stylesheet" href="public/bower_components/components-font-awesome/css/font-awesome.css" />
      <!-- endbower -->
      @show

      @section('script')
      <!-- bower:js -->
      <script src="public/bower_components/jquery/dist/jquery.js"></script>
      <script src="public/bower_components/datatables.net/js/jquery.dataTables.js"></script>
      <script src="public/bower_components/datatables.net-buttons/js/dataTables.buttons.js"></script>
      <script src="public/bower_components/datatables.net-buttons/js/buttons.colVis.js"></script>
      <script src="public/bower_components/datatables.net-buttons/js/buttons.flash.js"></script>
      <script src="public/bower_components/datatables.net-buttons/js/buttons.html5.js"></script>
      <script src="public/bower_components/datatables.net-buttons/js/buttons.print.js"></script>
      <script src="public/bower_components/bootstrap/dist/js/bootstrap.js"></script>
      <script src="public/bower_components/jquery-mousewheel/jquery.mousewheel.js"></script>
      <script src="public/bower_components/php-date-formatter/js/php-date-formatter.js"></script>
      <script src="public/bower_components/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
      <script src="public/bower_components/accounting/accounting.js"></script>
      <script src="public/bower_components/moment/moment.js"></script>
      <script src="public/bower_components/alertify/alertify.min.js"></script>
      <script src="public/bower_components/highcharts/highcharts.js"></script>
      <script src="public/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
          <script src="public/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
      <!-- endbower -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

      @show
      <script src="{{asset('public/Js/main.js?n=1')}}"></script>


      <title>Nombre Módulo</title>
  </head>

  <body>
      
       <!-- Menu Módulo -->
       <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <a href="#" class="navbar-brand">SIM</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a class="dropdown-toggle"  href="{{route('/')}}" >Inicio <span class="caret"></span></a>
              </li>
                @if(!empty($_SESSION['Usuario'][0]))
                  <li>
                    <a href="{{url('admin')}}">Administrador</a>
                  </li>
                @endif

            </ul>
              

            <ul class="nav navbar-nav navbar-right">
              <li><a href="http://www.idrd.gov.co/sitio/idrd/" target="_blank">I.D.R.D</a></li>
              <li><a href="{{url('logout')}}" >Cerrar Sesión</a></li>
            </ul>

          </div>
        </div>
      </div>
      <!-- FIN Menu Módulo -->
        
      <!-- Contenedor información módulo -->
      </br></br>
      <div class="container">
          <div class="page-header" id="banner">
            <div class="row">
              <div class="col-lg-8 col-md-7 col-sm-6">
                <h1 style="color:white;">Formulario de inscripción Aspirante a Guardianes de Ciclovía</h1></p>
              </div>
              <div class="col-lg-4 col-md-5 col-sm-6">
                 <div align="right"> 
                    <img src="public/Img/IDRD.JPG" width="50%" heigth="40%"/>
                 </div>                    
              </div>
            </div>
          </div>        
      </div>
      <!-- FIN Contenedor información módulo -->

      <!-- Contenedor panel principal -->
      <div class="container">
          @yield('content')
      </div>        
      <!-- FIN Contenedor panel principal -->
  </body>

</html>





