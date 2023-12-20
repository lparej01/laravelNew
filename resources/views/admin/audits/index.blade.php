@extends('theme.team.app')

@section('template_title')
   Auditoria
@endsection

@section('content')

<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-xl-12 col-sm-12 mb-4">
                        <x-tables.bo-table :data="$audits" title="GESTIÓN DE AUDITORÍA DE TODO EL SISTEMA" data-id="table" data-toolbar="#toolbar"
                            data-toggle="table" data-show-refresh="false" data-show-toggle="true"
                            data-show-fullscreen="false" data-show-columns="true" data-show-pagination-switch="false"
                            data-show-columns-toggle-all="true" data-search='true' data-search-accent-neutralise="true"
                            data-search-align="left" data-search-highlight="true" data-search-on-enter-key="false"
                            data-strict-search="true" data-pagination="true">
                            <x-slot:headerActions>

                                <div class="float-right">
                                   

                                    <x-notify.modal x-data="{ id: tableControlles.idRow }" id-modal="modalAuditorias">
                                        <x-slot:modalTitle>
                                            <h4 class="text-lg">Auditoria</h4>
                                        </x-slot:modalTitle>
                                        
                                        <x-slot:modalFooter>
                                            
                                        </x-slot:modalFooter>
                                    </x-notify>

                                    <x-notify.modal x-data="{ id: tableControlles.idRow }" id-modal="modalAuditorias">
                                        <x-slot:modalTitle>
                                            
                                        </x-slot:modalTitle>
                                        
                                        <x-slot:modalFooter>
                                            
                                        </x-slot:modalFooter>
                                    </x-notify>
                                </div>

                            </x-slot:headerActions>
                               @push('scripts')
                                    <script src="{{asset("assets/team/js/plugins/bootstrap-table.min.js")}}"></script>
                                     <script src="{{asset("assets/team/scripts/tables/audits.js")}}"></script>
                           
                                @endpush

                               
                        </x-tables.bo-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection
