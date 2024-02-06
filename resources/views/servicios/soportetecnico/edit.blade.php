@extends('theme.team.app')

@section('template_title')
  Editar una Gestión de Usuarios
@endsection

@section('content')  
<section class="content container-fluid">
  <div class="row">
      <div class="col-md-12">
         
          @includeif('partials.errors')
          <x-forms.template-form form-redirect-back="{{ route('soporte.list') }}" form-route="{{ route('update.soporte',$soporte->id) }}"
              form-method="POST">
                  @csrf
              <x-slot:formHeader>
                  <span class="align-self-center">IR A LISTA DE GESTIÓN DE SOPORTE TECNICO USUARIOS</span>
              </x-slot:formHeader>                       
                 
             
              <x-slot:formBody>
              
              @include('servicios.soportetecnico.form-edit')
                 
                  
              </x-slot:formBody>
              
              <x-slot:formFooter>
                  @include('include.botones')
              </x-slot:formFooter>

          </x-forms.template-form>
      </div>
      </div>
  </div>
</section>


   
@endsection