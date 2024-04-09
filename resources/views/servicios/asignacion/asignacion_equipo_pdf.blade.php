<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset("assets/team/img/iconos.jpeg")}}">
  <link rel="icon"  href="{{asset("assets/team/img/iconos.jpeg")}}" class="rounded">
  <title>
    Gestion de Soporte
  </title>
  
  <!--     Fonts and icons     -->
  <link href="{{asset("assets/team/fonts.googleapis.css?family=Open+Sans:300,400,600,700" )}}"rel="stylesheet" />
  <link href="{{asset("assets/team/css/nucleo-icons.css")}}" rel="stylesheet" />
  <link href="{{asset("assets/team/css/nucleo-svg.css")}}" rel="stylesheet" />  
  <link href="{{asset("assets/team/css/bootstrap-icon.css")}}" rel="stylesheet" />  
 

   <!-- Font Awesome Icons -->
  <script src="{{asset("assets/team/42d5adcbca.js") }}" crossorigin="anonymous"></script>

  <link href="{{asset("assets/team/css/nucleo-svg.css")}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset("assets/team/css/soft-ui-dashboard.css?v=1.0.7")}}" rel="stylesheet" />
 
  <link href="{{ asset("assets/team/css/toastr.min.css")}}" rel="stylesheet" type="text/css" />
  
  <script src="{{asset("assets/team/js/jquery.min.js")}}"></script>

</head>

<body class="g-sidenav-show  bg-gray-100">   
  
<hr class="horizontal dark mt-0">

<div class="container">
  <div class="img-inner dark">
    <img   width="100" height="100" src="{{ asset('assets/team/img/La-giralda-1024x985.png') }}" >
    <h3>{{ $data["title"] }}</h3>    
   </div> 

    <p ><strong>{{ $data["date"] }}</strong></p>
</div> 
<br>
<div class="container">      
    

    <div class="col-lg-4">       
        <div class="list-group">
  
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Nombre del Equipo</h5>
           <p class="mb-1">{{$data["asig"][0]->nombre_equipo}}</p>
          </div>
         
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Estado</h5>
           <p class="mb-1">{{$data["asig"][0]->Status}}</p>
          </div>
         
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Oficina</h5>
           <p class="mb-1">{{$data["asig"][0]->oficina}}</p>
          </div>
         
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Tipo de Equipo</h5>
           <p class="mb-1">{{$data["asig"][0]->tipo_equipo}}</p>
          </div>
         
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Equipo Asignado</h5>
           <p class="mb-1">{{$data["asig"][0]->equipo_asignado_person}}</p>
          </div>
         
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Sistema Operativo</h5>
           <p class="mb-1">{{$data["asig"][0]->sistema_oper}}</p>
          </div>
         
        </a>
        </div>
    </div>
    <br>
    <br>
    <div class="col-lg-4">  
            <div class="list-group">
            
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Tipo de Procesador</h5>
                <p class="mb-1">{{$data["asig"][0]->tipo_procesador}}</p>
                </div>
              
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Memoria Ram</h5>
                <p class="mb-1">{{$data["asig"][0]->memoria_ram}}</p>
                </div>
              
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Disco</h5>
                <p class="mb-1">{{$data["asig"][0]->disco}}</p>
                </div>
              
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Dominio del Sistema</h5>
                <p class="mb-1">{{$data["asig"][0]->dominio}}</p>
                </div>
              
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Any Desk</h5>
                <p class="mb-1">{{$data["asig"][0]->any_desk}}</p>
                </div>
              
              </a>
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Correo electronico</h5>
                <p class="mb-1">{{$data["asig"][0]->correo_electronico}}</p>
                </div>
              
              </a>
            </div>
        
    </div>
  

 
</div>
     


 

    <script src="{{asset("assets/team/js/core/popper.min.js")}}"></script>
    <script src="{{asset("assets/team/js/core/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/team/js/plugins/perfect-scrollbar.min.js")}}"></script>
    <script src="{{asset("assets/team/js/plugins/smooth-scrollbar.min.js")}}"></script>
    <script src="{{asset("assets/team/js/plugins/chartjs.min.js")}}"></script>    
    <script async defer src="{{asset("assets/team/buttons.github.io.js")}}"></script>  
    <script src="{{asset("assets/team/js/soft-ui-dashboard.min.js?v=1.0.7")}}"></script>   
    <script src="{{asset("assets/team/js/plugins/fullcalendar.min.js") }}"></script>  
    <script src="{{asset("assets/team/js/plugins/echarts.min.js") }}"></script>
    <script src="{{asset("assets/team/js/plugins/animate.min.js") }}"></script>    
    <script src="{{asset("assets/team/js/plugins/bootstrap-notify.js") }}"></script>
     
</body>

</html>