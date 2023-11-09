@extends('theme.team.app')

@section('template_title')
    Crear usuario
@endsection

@section('content')
@can('user.list')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')
                <x-forms.template-form form-redirect-back="{{ route('user.list') }}" form-route="{{ route('user.store') }}"
                    form-method="POST">

                    @csrf
                    
                    <x-slot:formHeader>
                        <span class="align-self-center">Crear usuario</span>
                    </x-slot:formHeader>
                    <x-slot:formBody>
                        @include('auth.user.form-create')
                    </x-slot:formBody>
                    <x-slot:formFooter>
                        <button type="submit" class="btn btn-primary btn-md mt-4 mb-4"  data-bs-toggle="tooltip" data-bs-placement="top"  title="Crear usuario">Guardar</button>
                    </x-slot:formFooter>

                </x-forms.template-form>
            </div>
        </div>
    </section>
@endcan
@endsection
