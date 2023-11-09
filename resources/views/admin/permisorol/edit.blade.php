@extends('theme.team.app')

@section('template_title')
    Editar Permiso Rol
@endsection

@section('content')

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')


            <x-forms.template-form form-redirect-back="{{ route('permiso.rol.list') }}" form-route="{{ route('update.permiso.rol',$permiso_rol->id) }}"
                form-method="POST"> 

                @csrf
               

                <x-slot:formHeader>
                    <span class="card-title">Editar Permiso Rol: {{ $permiso_rol->id }}</span>
                </x-slot:formHeader>
                <x-slot:formBody>
                    @include('admin.permisorol.form-edit')
                     
                </x-slot:formBody>
                <x-slot:formFooter>
                    @include('include.botones')
                </x-slot:formFooter>

            </x-forms.template-form>


        </div>
    </div>
</section>

@endsection
