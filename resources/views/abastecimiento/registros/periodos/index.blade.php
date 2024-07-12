@extends('theme.team.app')

@section('template_title')
  Listados de periodos
@endsection

@section('content') 

@php($actionsBlade = json_decode($actions))

<div class="container-fluid"> 
    <div class="box box-info padding-1">
      <div class="box-body">  
              

              <div class="col-md-12">
                <form class="row g-3" action="{{ route('generar.periodo') }}">
                    
                    <div class="col-lg-6">
                      {{ Form::label('Periodo o Zafra') }}
                      @include('abastecimiento.registros.periodos.select-year')
                      {!! $errors->first('anio', '<div class="invalid-feedback">:message</div>') !!}
                   </div>                        
                   
                      <div class="col-md-11">  
                        <button type="submit" class="btn btn-primary btn-md mt-4 mb-4">Generar periodo</button>
                    </div>   
                      
                  </form>               

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
  </div> 
 <script src="{{asset("assets/team/funciones.js")}}"></script>

</div>
   
@endsection