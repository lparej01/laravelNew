@extends('theme.team.app')

@section('template_title')
  Crear Servicio de Soporte
@endsection

@section('content')  

<div class="row">
                
    <div class="col-md-12">
        @includeif('partials.errors')
        <x-forms.template-form form-redirect-back="{{ route('soporte.list') }}" form-route="{{ route('save.soporte') }}"
            form-method="POST">
                @csrf
            <x-slot:formHeader>
                <span class="align-self-center">IR A LISTA DE SERVICIOS DE SOPORTE TECNICO</span>
            </x-slot:formHeader>           
              
           
            <x-slot:formBody>
            
               @include('servicios.soportetecnico.form-create')
                
            </x-slot:formBody>
            <x-slot:formFooter>
                @include('include.botones')
            </x-slot:formFooter>

        </x-forms.template-form>

    </div>
</div>
</section>


   
@endsection