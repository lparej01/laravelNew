@extends('theme.team.app')

@section('template_title')
 Editar Equipo
@endsection

@section('content')  
<div class="row">
  <div class="col-md-12">
     
      @includeif('partials.errors')
      <x-forms.template-form form-redirect-back="{{ route('asignacion.list') }}" form-route="{{ route('update.asignacion',$data->id) }}"
          form-method="POST">
              @csrf
          <x-slot:formHeader>
              <span class="align-self-center">IR A LISTA DE EQUIPOS</span>
          </x-slot:formHeader>                       
             
         
          <x-slot:formBody>
          
          @include('servicios.asignacion.form-edit')
             
              
          </x-slot:formBody>
          
          <x-slot:formFooter>
              @include('include.botones')
          </x-slot:formFooter>

      </x-forms.template-form>
  </div>
  </div>
</div>
   
@endsection