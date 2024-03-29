@extends('theme.team.app')

@section('template_title')
    Editar Movi
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('movinv.list') }}" form-route="{{ route('save.movinv') }}"
                        form-method="POST">                        
                         @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">IR A LA LISTA DE MOVIMIENTO DE INVENTARIO</span>
                        </x-slot:formHeader>                       
                           
                       
                        <x-slot:formBody>
                        
                        @include('abastecimiento.transacciones.movinventario.form-create')
                           
                            
                        </x-slot:formBody>
                        
                        <x-slot:formFooter>
                            @include('include.botones')
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>


@endsection