@extends('theme.team.app')

@section('template_title')
   Periodo seleccionado
@endsection

@section('content')

<section class="content container-fluid">
    <div class="container"> 
        <div class="card-header d-flex justify-content-between">
            <p class="card-title d-flex gap-2 align-content-center align-items-lg-center justify-content-center">
                <a class="btn btn-icon-only btn-link btn-light" href="{{ route('periodo.list')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
                    </svg>
                </a>
                <span class="align-self-center">IR A PERIODOS</span>

                
            </p>
    
        </div>
        <h5 class="card-title">Periodo selecionado..</h5> 
        <br> 
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">  
                 
            @foreach ($periodoObtenido as $item)   
                <div class="col">
                    <div class="card">
                        @if ($item->esCerrado == 1 && $item->esActual ==0 )
                            <div class="card-header bg-dark text-white text-center border-dark" style="height: 70px">
                                @if ($item->mes > 9)
                                <h5 class="card-title" style="color: rgb(255, 240, 254)">{{$item->anio  }}-{{$item->mes }}</h5> 
                                @else
                                <h5 class="card-title" style="color: rgb(255, 240, 254)">{{$item->anio  }}-0{{$item->mes }}</h5>  
                                @endif
                               
                                
                            </div>
                            <div class="card-body">
                                <!--Mes activo-->
                                <h5 class="card-title">{{$item->mesNombre  }}</h5>
                                <p class="card-text">{{$item->cerrado}}</p>
                                @if ($item->actual == "Cerrar")
                                    <a href="{{ route('cerrar.periodo',$item->periodo)}}dd" class="btn btn-dark">{{$item->actual}}</a>  
                        
                                @else
                                    <!--<a href="{{ route('abrir.periodo',$item->periodo)}}" class="btn btn-primary">{{$item->actual}}</a> -->
                                @endif
                            
                            </div>                      
                       
                            
                        @else

                            <div class="card-header bg-primary text-white text-center border-success" style="height: 70px">
                                @if ($item->mes > 9)
                                <h5 class="card-title" style="color: rgb(255, 240, 254)">{{$item->anio  }}-{{$item->mes }}</h5> 
                                @else
                                <h5 class="card-title" style="color: rgb(255, 240, 254)">{{$item->anio  }}-0{{$item->mes }}</h5>  
                                @endif
                                
                            </div>
                            <div class="card-body">
                                <!-- Periodo actual -->
                                @if ($item->actual == "Cerrar")
                                <h5 class="card-title">{{$item->mesNombre  }}</h5>
                                <p class="card-text">Periodo en Proceso</p>
                                    <a href="{{ route('cerrar.periodo',$item->periodo)}}" class="btn btn-danger">{{$item->actual}}</a>  
                        
                                @else
                                 <!-- Periodo que faltan del año -->
                                <h5 class="card-title">{{$item->mesNombre  }}</h5>
                                <p class="card-text">{{$item->cerrado}}</p>
                                    <a href="{{ route('abrir.periodo',$item->periodo)}}" class="btn btn-primary">{{$item->actual}}</a> 
                                @endif
                            
                            </div>
                            
                        @endif
                       
                    </div>
                </div>         
            @endforeach
        </div>  
    </div>                
                  
<br>
<br>
<br>
<br>
<br>
<br>
<br>
 <br>
<br>
<br>
<br>             
</section>


@endsection