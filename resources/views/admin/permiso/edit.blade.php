@extends('theme.team.app')

@section('template_title')
    Editar Permiso
@endsection

@section('content')

<section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('permiso.list') }}" form-route="{{ route('update.permiso',$permiso ->id) }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">Ir a lista de permisos</span>
                        </x-slot:formHeader>                       
                           
                       
                        <x-slot:formBody>
                        
                            @include('admin.permiso.form-edit')
                            
                        </x-slot:formBody>
                        
                        <x-slot:formFooter>
                            @include('include.botones')
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>


@endsection