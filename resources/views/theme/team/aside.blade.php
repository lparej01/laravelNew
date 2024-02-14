 <!--Aside  MENU LATERAL-->
 <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
     id="sidenav-main">
     <div class="sidenav-header">
         <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
             aria-hidden="true" id="iconSidenav"></i>
         <a  href="#" >           
            <div class="img-inner dark">
                <img   width="100" height="100" src="{{ asset('assets/team/img/La-giralda-1024x985.png') }}" >
                <span class="ms-1 font-weight-bold">Gestion de Soporte Web</span>
            </div>
             
         </a>
     </div>
     <hr class="horizontal dark mt-0">
     <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>       
             <a class="btn btn-primary  w-80" href="{{ route('inicio') }}">Inicio</a>
     </div>
     <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
         <ul class="navbar-nav">
             @foreach ($menusComposer as $key => $item)
                 @if ($item['menu_id'] != 0)
                 @break
             @endif
             @include('theme.team.menu-item', ['item' => $item])
            @endforeach
         

     </ul>
     </div>
     <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ url('/logout') }}" target="_blank">
            <img src="{{ asset('assets/team/img/icons8-choose-48.png') }}"          navbar-brand-img h-200" alt="main_logo">
            <span class="ms-1 font-weight-bold">Salir del Sistema</span>
        </a>
    </div>
  
  
</aside>

             







