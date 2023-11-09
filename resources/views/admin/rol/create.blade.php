@extends('theme.team.app')

@section('template_title')
    Create Rol
@endsection
@section('content')

        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('rol.list') }}" form-route="{{ route('save_rol') }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">Ir a lista de roles</span>
                        </x-slot:formHeader>
                         
                           
                       
                        <x-slot:formBody>
                        
                            @include('admin.rol.form-create')
                            
                        </x-slot:formBody>
                        <x-slot:formFooter>
                            @include('include.botones')
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>

@endsection
