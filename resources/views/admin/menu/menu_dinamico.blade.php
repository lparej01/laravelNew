@extends('theme.team.app')

@section('template_title')
  Menu
@endsection

@section('content')

<link href="{{ asset("assets/team/js/jquery-nestable/jquery.nestable.css")}}" rel="stylesheet" type="text/css" />


     
        <div class="card card-info">        
            <x-forms.template-form form-redirect-back="{{ route('menu.list') }}" form-route="#" form-method="POST">
                @csrf
                <x-slot:formHeader>
                    <span class="align-self-center">IR A LISTA DE MENU</span>
                </x-slot:formHeader>          
                <x-slot:formBody>      
                       
                                                  
                                
                        <div class="container">

                            <h3 class="card-title">Menú Dinamico</h3> 
                      
                            <div class="dd" id="nestable">
                                <ol class="dd-list">
                                    @foreach ($menu as $key => $item)
                                        @if ($item["menu_id"] != 0)
                                            @break
                                        @endif
                                        @include("admin.menu.menu-item",["item" => $item])
                                    @endforeach
                                </ol>
                            </div>
                     
                        </div>
                </x-slot:formBody>
                <x-slot:formFooter>               
                </x-slot:formFooter>
            </x-forms.template-form>
             
           
        
        </div>
        <script src="{{asset("assets/team/js/jquery-nestable/jquery.nestable.js")}}" type="text/javascript"></script>
        <script src="{{asset("assets/team/scripts/tables/menu/menu_dinamico.js")}}" type="text/javascript"></script>
        <script src="{{asset("assets/team/funciones.js")}}" type="text/javascript"></script>
@endsection