@extends('layouts.user_type.auth')

@section('template_title')
    Cambio de Contraseña
@endsection

@section('content')
    <section>
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('{{ asset('/assets/img/curved-images/curved0.jpg') }}'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('/assets/img/bruce-mars2.jpg') }}" alt="..."
                                class="w-100 border-radius-lg shadow-sm">
                            {{-- <a href="javascript:;"
                                class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                                <i class="bi bi-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Edit Image"></i>
                            </a> --}}
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $user->name }}
                                {{ $user->last_name }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{-- {{ __(' CEO / Co-Founder') }} --}}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            @includeif('partials.errors')

            <x-forms.template-form form-redirect-back="{{ route('home') }}"
                form-route="{{ route('user.change_password_post', $user->id) }}" form-method="POST">

                <x-slot:formHeader>
                    <span class="align-self-center">Cambio de Contraseña</span>
                </x-slot:formHeader>
                <x-slot:formBody>
                    @include('auth.user.form-change-password')
                </x-slot:formBody>
                <x-slot:formFooterNotSubmit>
                    <button id="changePassword" type="button"
                    class="btn btn-primary btn-md mt-4 mb-4">Guardar</button>
                </x-slot:formFooterNotSubmit>
            </x-forms.template-form>
        </div>
    </section>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src={{ asset('/assets/scripts/change_password.js') }}></script>
@endsection