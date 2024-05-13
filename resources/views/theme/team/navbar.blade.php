<!-- Navbar MENU HORIZONTAL -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl card" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Seccion</a></li>
            <li class="breadcrumb-item text-sm text-dark active " aria-current="page"> {{ trans( getCurrentRoute()) }}</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Escritorio</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">             
             
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">            
            <li class="nav-item d-flex align-items-center">
              
               <span class="d-sm-inline d-none">{{ user()->username}}</span>

                   @if ( user()->images == null)
                    <img id="imagen" src ="{{ asset('storage').'/imagenes/avatar.png'}}"  class="rounded avatar avatar-sm  me-3" width="200" height="150" >
                    @else
                    <img id="imagen" src ="{{ asset('storage').'/'.user()->images}}"  class="rounded avatar avatar-sm  me-3" width="150" height="150" >
                     @endif                
                 
               
             
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="{{ url('/logout')}}" class="nav-link text-body font-weight-bold px-0">
                          
                 <span class="d-sm-inline d-none"><img id="imagen" src ="{{  asset('recursos/iconos/img_new/icons8-reiniciar-94.png')}}"  class="rounded avatar avatar-sm  me-3" width="150" height="150" >Cerrar session</span>                
               
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
           
           
          </ul>
        </div>
      </div>
    </nav>
	<!--fin Navbar -->
<div class="container-fluid py-4">
  <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Proveedores</p>
                    <h5 class="font-weight-bolder mb-0">
                     {{ contarProveedores()}}
                     
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pedidos</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ obtenerSumaPedido() }}
                     
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Despachos</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{obtenerSumaDespachos()}}
                     
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Periodo Activo</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{periodoActual()}}
                      
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
 </div>  

 