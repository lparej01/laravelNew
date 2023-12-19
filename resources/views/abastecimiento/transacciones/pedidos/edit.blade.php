@extends('theme.team.app')

@section('template_title')
    Editar Pedido
@endsection

@section('content')

    <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                   
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('pedidos.list') }}" form-route="{{ route('update.pedidos',$pedidos ->pedidoId) }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">IR A LISTA DE PEDIDOS</span>
                        </x-slot:formHeader>                       
                           
                       
                        <x-slot:formBody>
                        
                        @include('abastecimiento.transacciones.pedidos.form-edit')
                           
                            
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