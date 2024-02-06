@extends('theme.team.app')

@section('template_title')
  Crear Incidencias
@endsection

@section('content')  

<div class="row">
                
    <div class="col-md-12">
        @includeif('partials.errors')
        <x-forms.template-form form-redirect-back="{{ route('incidencias.list') }}" form-route="{{ route('save.incidencias') }}"
            form-method="POST">
                @csrf
            <x-slot:formHeader>
                <span class="align-self-center">IR A LISTA DE INCIDENCIAS</span>
            </x-slot:formHeader>           
              
           
            <x-slot:formBody>
            
               @include('servicios.incidencias.form-create')
                
            </x-slot:formBody>
            <x-slot:formFooter>
                @include('include.botones')
            </x-slot:formFooter>

        </x-forms.template-form>

    </div>
</div>
</section>


   
@endsection