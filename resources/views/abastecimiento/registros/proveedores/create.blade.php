@extends('theme.team.app')

@section('template_title')
   Crear proveedores
@endsection

@section('content')
<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('proveedores.list') }}" form-route="{{ route('save.proveedores') }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">IR A LA LISTA DE PROVEEDORES</span>
                        </x-slot:formHeader>                        
                           
                       
                        <x-slot:formBody>
                               @include('abastecimiento.registros.proveedores.form-create')
                          
                            
                        </x-slot:formBody>
                        
                        <x-slot:formFooter>
                            @include('include.botones')
                         
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>

@endsection