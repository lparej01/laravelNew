@extends('theme.team.app')

@section('template_title')
   Crear plan
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('combos.list') }}" form-route="{{ route('save.combos') }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">IR A LISTA DE COMBOS</span>
                        </x-slot:formHeader>                       
                           
                       
                        <x-slot:formBody>
                        
                        @include('abastecimiento.produccion.combos.form-create')
                            
                        </x-slot:formBody>
                        <x-slot:formFooter>
                           
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>

@endsection