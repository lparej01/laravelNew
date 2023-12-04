@extends('theme.team.app')

@section('template_title')
    Editar Movi
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('obtener_pedidos.movinv') }}" form-route="{{ route('update.movinv',$movinv ->pedidoId) }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">Ir a lista de moviento de inventario</span>
                        </x-slot:formHeader>                       
                           
                       
                        <x-slot:formBody>
                        
                        @include('abastecimiento.transacciones.movinventario.form-edit')
                           
                            
                        </x-slot:formBody>
                        
                        <x-slot:formFooter>
                            @include('include.botones')
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>


@endsection