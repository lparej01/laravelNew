@extends('theme.team.app')

@section('template_title')
  Editar una Inicdencias
@endsection

@section('content')  
<section class="content container-fluid">
  <div class="row">
      <div class="col-md-12">
         
          @includeif('partials.errors')
          <x-forms.template-form form-redirect-back="{{ route('incidencias.list') }}" form-route="{{ route('update.incidencias',$incidencias->id) }}"
              form-method="POST">
                  @csrf
              <x-slot:formHeader>
                  <span class="align-self-center">IR A LISTA DE TIPO DE INCIDENCIAS</span>
              </x-slot:formHeader>                       
                 
             
              <x-slot:formBody>
              
              @include('servicios.incidencias.form-edit')
                 
                  
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