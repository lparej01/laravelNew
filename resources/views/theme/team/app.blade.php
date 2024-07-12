<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset("assets/team/img/icon-sun-cloud.png")}}">
  <link rel="icon"  href="{{asset("assets/team/img/la-giralda.png")}}" class="rounded">
  <title>
    Agrícola Santa Cruz
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
  <script src="{{asset("assets/team/js/jquery.min.js")}}"></script>

  <script src="{{asset("assets/team/js/toastr.min.js")}}" type="text/javascript"></script>
  <link href="{{ asset("assets/team/css/toastr.min.css")}}" rel="stylesheet" type="text/css" />
  
  

</head>

<body  class="g-sidenav-show  bg-gray-100">


<x-loadingscreen></x-loadingscreen>

 @include("theme/$theme/aside")


 <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">  
    <br>
        @include("theme/$theme/navbar")    
        <main class="py-4">
       
         @yield('content', View::make('theme.team.container'))  
      
         @include("theme/$theme/footer") 
       
         </main>



    </div>
	   <!--container-->


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
    <script src="{{asset("assets/team/js/plugins/axios.js") }}"></script>
    <script src="{{asset("assets/team/js/plugins/axios.min.js") }}"></script>  
    

    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <x-notify.status-notify></x-notify.status-notify>

   

</body>

</html>
