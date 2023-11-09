@extends('theme.team.app')

@section('template_title')
    Create Permiso rol
@endsection
@section('content')

 <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')
                <x-forms.template-form form-redirect-back="{{ route('permiso.rol.list') }}"
                    form-route="{{ route('guardar.permiso.rol') }}" form-method="POST">
                    @csrf
                    <x-slot:formHeader>
                        <span class="align-self-center">Crear nuevo permiso</span>
                    </x-slot:formHeader>
                    <x-slot:formBody>

                        <div class="box box-info padding-1">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-lg-6">
                                            @include('admin.permisorol.select-orig')
                                        </div>

                                        <div class="col-lg-6">
                                            @include('admin.permisorol.select-dest')
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-slot:formBody>
                    <x-slot:formFooter>
                        < @include('include.botones')
                    </x-slot:formFooter>

                </x-forms.template-form>

            </div>
        </div>
    </section>

@endsection