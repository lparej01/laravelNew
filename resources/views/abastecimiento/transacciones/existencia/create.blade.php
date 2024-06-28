@extends('theme.team.app')

@section('template_title')
   
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('existencia.list') }}" form-route="{{ route('save.existencia') }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">IR A LISTA DE EXISTENCIA</span>
                        </x-slot:formHeader>
                         
                          
                       
                        <x-slot:formBody>
                            <h4>Crear una Existencia</h4>
                        @include('abastecimiento.transacciones.existencia.form-create')
                            
                        </x-slot:formBody>
                        <x-slot:formFooter>
                            @include('include/botones')
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>

@endsection