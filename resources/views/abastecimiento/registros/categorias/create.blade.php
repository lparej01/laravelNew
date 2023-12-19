@extends('theme.team.app')

@section('template_title')
   Categorias
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('categorias.list') }}" form-route="{{ route('save.categorias') }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">IR A LISTA DE CATEGORIAS</span>
                        </x-slot:formHeader>
                         
                           
                       
                        <x-slot:formBody>
                        
                        @include('abastecimiento.registros.categorias.form-create')
                            
                        </x-slot:formBody>
                        <x-slot:formFooter>
                            @include('include.botones')
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>

@endsection