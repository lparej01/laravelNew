@extends('theme.team.app')

@section('template_title')

 Crear cátalogo ó sku
   
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('catalogos.list') }}" form-route="{{ route('save.catalogos') }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">IR A LA LISTA DE SKU</span>
                        </x-slot:formHeader>
                         
                           
                       
                        <x-slot:formBody>
                        
                         @include('abastecimiento.registros.catalogos.form-create')
                            
                        </x-slot:formBody>
                        <x-slot:formFooter>
                            @include('include.botones')
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>

@endsection