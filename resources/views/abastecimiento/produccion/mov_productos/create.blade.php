@extends('theme.team.app')

@section('template_title')
   Registrar movimientos de productos
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('permiso.list') }}" form-route="{{ route('save.permiso') }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">IR A MOVIMIENTOS DE PRODUCTOS</span>
                        </x-slot:formHeader>
                         
                           
                       
                        <x-slot:formBody>
                        
                          
                            
                        </x-slot:formBody>
                        <x-slot:formFooter>
                            <button type="submit" class="btn btn-primary btn-md mt-4 mb-4">Guardar</button>
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>

@endsection