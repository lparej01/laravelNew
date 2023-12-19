@extends('theme.team.app')

@section('template_title')
  Existencia
@endsection

@section('content') 

@php($actionsBlade = json_decode($actions))

<div class="container-fluid">
  <div class="col-sm-12" >                     
       <x-tables.bo-table :data="$existencia" title="LISTADO DE EXISTENCIA DE ALIMENTOS" data-id="dtHorizontalExample" data-toolbar="#toolbar"
                          data-toggle="table" data-show-refresh="false" data-show-toggle="false"
                          data-show-fullscreen="false" data-show-columns="true" data-show-pagination-switch="false"
                          data-show-columns-toggle-all="true" data-search='true' data-search-accent-neutralise="true"
                          data-search-align="left" data-search-highlight="true" data-search-on-enter-key="false"
                          data-strict-search="true" data-pagination="true"  >
                          <x-slot:headerActions>

                              <div class="float-right"  >
                                {{--    @if ($actionsBlade->can_create > 0)
                                      <a href="{{ route('crear.existencia') }}" class="btn btn-primary float-right"
                                          data-placement="left">
                                          {{ __('Generar Nueva Existencia por Periodo') }}
                                      </a>
                                  @endif --}}

                                  <x-notify.modal x-data="{ id: tableControlles.idRow }" id-modal="modalExistencia">
                                      <x-slot:modalTitle>
                                          <h4 class="text-lg">Existencia</h4>
                                      </x-slot:modalTitle>

                                  </x-notify>

                                      <x-notify.modal x-data="{ id: tableControlles.idRow }" id-modal="modalExistencia">
                                      </x-notify>
                              </div>

                          </x-slot:headerActions>

                          @push('scripts')
                              <script>
                                  (function() {
                                      let rolActions = {!! $actions !!};
                                      tableControlles.conditionalRow({

                                          @if ($actionsBlade->can_show > 0)
                                              show: rolActions.can_show,
                                          @endif

                                          @if ($actionsBlade->can_edit > 0)
                                              edit: rolActions.can_edit,
                                          @endif

                                          @if ($actionsBlade->can_disable > 0)
                                              disable: rolActions.can_disable,
                                          @endif

                                         /*  @if ($actionsBlade->can_delete > 0)
                                              delete: rolActions.can_delete,
                                          @endif  */
                                      })
                                  })()

                                 
                              </script>
                             
                              <script src="{{asset("assets/team/js/plugins/bootstrap-table.min.js")}}"></script>
                              <script src="{{asset("assets/team/scripts/tables/abastecimiento/transacciones/existencia.js")}}"></script>
                          @endpush                             
                     

       </x-tables.bo-table>
   
  </div>   
</div> 

   
@endsection