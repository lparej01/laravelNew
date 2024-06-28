@extends('theme.team.app')

@section('template_title')
   
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('productos.list') }}" form-route="{{ route('save.productos') }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">IR A LA LISTA DE PRODUCTOS</span>
                        </x-slot:formHeader>
                         
                           
                       
                        <x-slot:formBody>
                        
                            @include('abastecimiento.produccion.productos.form-create')
                            
                        </x-slot:formBody>
                        <x-slot:formFooter>
                            @include('include.botones')
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>

@endsection