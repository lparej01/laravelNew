@extends('theme.team.app')

@section('template_title')
   Usuarios roles
@endsection

@section('content')
   @php($actionsBlade = json_decode($actions))

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xl-12 col-sm-12 mb-4">

                            <x-tables.bo-table :data="$usersroles" title="Lista de Usuarios y Roles" data-id="table" data-toolbar="#toolbar"
                                data-toggle="table" data-show-refresh="false" data-show-toggle="false"
                                data-show-fullscreen="false" data-show-columns="true" data-show-pagination-switch="false"
                                data-show-columns-toggle-all="true" data-search='true' data-search-accent-neutralise="true"
                                data-search-align="left" data-search-highlight="true" data-search-on-enter-key="false"
                                data-strict-search="true" data-pagination="true">
                                <x-slot:headerActions>

                                    <div class="float-right">
                                    

                                        <x-notify.modal x-data="{ id: tableControlles.idRow }" id-modal="modalUsersRol">
                                            <x-slot:modalTitle>
                                                <h4 class="text-lg">Users Roles</h4>
                                            </x-slot:modalTitle>

                                        </x-notify>

                                            <x-notify.modal x-data="{ id: tableControlles.idRow }" id-modal="modalUsersRol">
                                            </x-notify>
                                    </div>

                                </x-slot:headerActions>

                                @push('scripts')
                                   <script>
                                        (function() {
                                            let rolActions = {!! $actions !!};
                                            tableControlles.conditionalRow({

                                                @if ($actionsBlade->can_query > 0)
                                                    show: rolActions.can_query,
                                                @endif

                                                @if ($actionsBlade->can_update > 0)
                                                    edit: rolActions.can_update,
                                                @endif

                                               
                                            })
                                        })()
                                    </script>
                                   <script src="{{asset("assets/team/js/plugins/bootstrap-table.min.js")}}"></script>
                                    <script src="{{asset("assets/team/scripts/tables/usersrol.js")}}"></script>
                                   
                                @endpush

                            </x-tables.bo-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection