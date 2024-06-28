@extends('theme.team.app')

@section('template_title')
    Editar 
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('planes-produccion.list') }}" form-route="{{ route('update.planes-produccion',$planid->planId) }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">IR A LISTA DE PLANES DE PRODUCCION </span>
                        </x-slot:formHeader>                       
                           
                       
                        <x-slot:formBody>
                        
                            @include('abastecimiento.produccion.planes_produccion.form-edit')
                            
                        </x-slot:formBody>
                        
                        <x-slot:formFooter>
                            @include('include.botones')
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>


@endsection