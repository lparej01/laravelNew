@extends('theme.team.app')

@section('template_title')
  Crear Departamentos
@endsection

@section('content')  

<div class="row">
                
    <div class="col-md-12">
        @includeif('partials.errors')
        <x-forms.template-form form-redirect-back="{{ route('departamentos.list') }}" form-route="{{ route('save.departamentos') }}"
            form-method="POST">
                @csrf
            <x-slot:formHeader>
                <span class="align-self-center">IR A LISTA DE DEPARTAMENTOS</span>
            </x-slot:formHeader>           
              
           
            <x-slot:formBody>
            
               @include('servicios.departamentos.form-create')
                
            </x-slot:formBody>
            <x-slot:formFooter>
                @include('include.botones')
            </x-slot:formFooter>

        </x-forms.template-form>

    </div>
</div>
</section>


   
@endsection