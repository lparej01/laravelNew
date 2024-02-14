@extends('theme.team.app')

@section('template_title')
  Gestion de Reportes
@endsection

@section('content')  
<div class="container-fluid">    
        
        <div class="col-md-12">
            @includeif('partials.errors')
            <x-forms.template-form form-redirect-back="{{ route('soporte.list') }}" form-route="{{ route('reporte.soporte') }}"
                form-method="POST">
                    @csrf
                <x-slot:formHeader>
                    <span class="align-self-center">IR A LISTA DE SERVICIOS DE SOPORTE TECNICO</span>
                </x-slot:formHeader>           
                  
               
                <x-slot:formBody>
            <div class="col-lg-6">
                {{ Form::label('Consulta') }}
                <select name="depart_id" id="depart_id" class="form-select @error('depart_id') is-invalid @enderror" >
                  <option value=""selected> Seleccione..</option>            
                 
                  <option value="" >Incidencias por mes</option> 
                  <option value="" >Incidencias todas</option>  
                   
                     
               
               </select> 
                
                {!! $errors->first('depart_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
           
           
        </div>
    
              
</x-slot:formBody>
<x-slot:formFooter>
    <div class="col-md-12"  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">  
        
        <button type="submit" class="btn btn-primary btn-md mt-4 mb-4">Solicitar</button>
    </div>
</x-slot:formFooter>

</x-forms.template-form>

</div>
   <br>
   <br>
   <br>
   <br>
   <br>
@endsection