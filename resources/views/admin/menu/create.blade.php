@extends('theme.team.app')

@section('template_title')
   Crear un item del menu
@endsection

@section('content')

<section class="content container-fluid">   
    <div class="row">
                
                <div class="col-md-12">
                    @includeif('partials.errors')
                    <x-forms.template-form form-redirect-back="{{ route('menu.list') }}" form-route="{{ route('save_menu') }}"
                        form-method="POST">
                            @csrf
                        <x-slot:formHeader>
                            <span class="align-self-center">IR A LISTA DE MENÚ</span>
                        </x-slot:formHeader>
                         
                          
                       
                        <x-slot:formBody>
                        
                           @include('admin.menu.form-create')
                            
                        </x-slot:formBody>
                        <x-slot:formFooter>
                            @include('include.botones')
                        </x-slot:formFooter>

                    </x-forms.template-form>

                </div>
            </div>
        </section>

@endsection