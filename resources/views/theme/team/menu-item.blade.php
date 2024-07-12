
 
 @if ($item['submenu'] == [])
      {{--   Cuando no tiene sub menu --}}
     <li class="nav-item">
         <a class="nav-link m-0" data-bs-toggle="collapse" href="{{ $item['url'] }}" aria-expanded="false"
             aria-controls="ui-basic">

             <div class="icon icon-shape icon-sm shadow bg-gradient-white border-radius-md bg-outline-danger text-white text-center me-2 d-flex align-items-center justify-content-center">
                   <img id="imagen" src ="{{ asset('storage').'/'.$item['icono']}}"  class="rounded" width="40" height="40" >
             </div>
             <b class="menu-title" style="font-size: 16px;">{{ $item['nombre'] }}</b>
             <i class="menu-arrow"></i>
         </a>
     </li>
 @else
  {{--   Cuando  tiene sub menu --}}
     <li class="nav-item "  >
         <a class="nav-link m-0 "  data-bs-toggle="collapse" href="{{ $item['url'] }}" aria-expanded="false"
             aria-controls="ui-basic">
             <div
                 class="icon icon-shape icon-sm shadow bg-gradient-white border-radius-md bg-outline-danger text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <img id="imagen" src ="{{ asset('storage').'/'.$item['icono']}}"  class="rounded" width="40" height="40" >
                  
                 
             </div>
             <b class="menu-title" style="font-size: 18px;">{{ $item['nombre'] }}</b>
             <i class="menu-arrow"></i>
         </a>
         <div class="collapse" id="{{ $item['tipo'] }}">
             <ul class="flex-column sub-menu navbar-nav">
                 @foreach ($item['submenu'] as $submenu)
                     <li class="nav-item mt-2">
                         <a class="nav-link" href="{{ route($submenu['url']) }}">
                         
                             <div class="icon icon-shape icon-sm shadow bg-gradient-primary border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                             
                              <img id="imagen" src ="{{ asset('storage').'/'.$submenu['icono']}}"  class="rounded" width="40" height="40" >
                             </div>
                             <span class="nav-link-text ms-1" >{{ $submenu['nombre'] }}</span>
                         </a>
                     </li>
                 @endforeach


             </ul>
         </div>
     </li>

  

 @endif
 
<!-- End Navbar -->
