@extends('layouts.user_type.auth')

@section('template_title')
    Asignar Rol Menú
@endsection

@section('content')
    @can('rol.menu')
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <div class="row">
                        <div class="col-12">

                            <x-forms.template-form form-redirect-back="{{ route('rol.menu') }}" form-route="/" form-method="POST">
                                <x-slot:formHeader>
                                    <span class="align-self-center">Opciones de permisos</span>
                                </x-slot:formHeader>
                                <x-slot:formBody>
                                    <table class="table table-bordered table-condensed table-hover table-striped text-center">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Opción Menú</th>
                                                <th>Remover Permiso</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permissions as $permission)
                                                <tr>
                                                    <td>{{ $permission->description }}</td>
                                                    <td>
                                                        <a href="{{ route('rol.remove', ['role_id' => $role->id, 'permission_id' => $permission->permission_id]) }}"
                                                            class="btn btn-danger btn-icon-only"><i class="bi bi-x-circle"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </x-slot:formBody>


                            </x-forms.template-form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endcan
@endsection
