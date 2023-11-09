@extends('theme.team.app')

@section('template_title')
    Editar Users Rol
@endsection

@section('content')

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')


            <x-forms.template-form form-redirect-back="{{ route('users.rol.list') }}" form-route="{{ route('update.users.rol',$usersrol->id) }}"
                form-method="POST"> 
                @csrf               

                <x-slot:formHeader>
                    <span class="card-title">Editar Usuario Rol: {{ $usersrol->nombre }}</span>
                </x-slot:formHeader>
                <x-slot:formBody>
                    @include('admin.usersrol.form-edit')
                     
                </x-slot:formBody>
                <x-slot:formFooter>
                    <button type="submit" class="btn btn-primary btn-md mt-4 mb-4">Guardar</button>
                </x-slot:formFooter>

            </x-forms.template-form>


        </div>
    </div>
</section>

@endsection
