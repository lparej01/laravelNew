@extends('layouts.user_type.auth')

@section('template_title')
    Rol Menú
@endsection
@section('content')
@can('rol.menu') 
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')
                <x-forms.template-form form-redirect-back="{{ route('rol.list') }}" form-route="{{ route('rol.asignar_permiso') }}"
                    form-method="POST">

                    <x-slot:formHeader>
                        <span class="card-title">Asignación Rol Menu</span>
                    </x-slot:formHeader>
                    <x-slot:formBody>
                        @include('auth.rol.rol-menu.form-menu')
                    </x-slot:formBody>
                    <x-slot:formFooter>
                        <button type="submit" class="btn btn-primary btn-md mt-4 mb-4">Guardar</button>
                    </x-slot:formFooter>

                </x-forms.template-form>
            </div>
        </div>
    </section>
@endcan
@endsection
