@extends('theme.team.app')

@section('template_title')
  Editar un departamentos
@endsection

@section('content')  
<section class="content container-fluid">
  <div class="row">
      <div class="col-md-12">
         
          @includeif('partials.errors')
          <x-forms.template-form form-redirect-back="{{ route('departamentos.list') }}" form-route="{{ route('update.departamentos',$departamentos->id) }}"
              form-method="POST">
                  @csrf
              <x-slot:formHeader>
                  <span class="align-self-center">IR A LISTA DE DEPARTAMENTOS</span>
              </x-slot:formHeader>                       
                 
             
              <x-slot:formBody>
              
              @include('servicios.departamentos.form-edit')
                 
                  
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