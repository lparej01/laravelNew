<div class="box box-info padding-1">
    <div class="box-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4">
                        <select name="role_id" id="" onchange="location = this.value;" class="form-select @error('role_id') is-invalid @enderror" placeholder = "Seleccionar Rol">
                            @if ($id)
                                    <option selected="true" value="{{ $id }}">{{ $name_role->name }} seleccionado</option>    
                                @foreach ($list_roles as $roles)
                                    <option value="{{ route('rol.menu',$roles->id) }}">{{ $roles->name }}</option>
                                @endforeach
                            @else
                                    <option selected="true" disabled="disabled">Seleccionar Rol</option>    
                                @foreach ($list_roles as $roles)
                                    <option value="{{ route('rol.menu',$roles->id) }}">{{ $roles->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                    <table class="table table-bordered table-condensed table-hover table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>Opciones Asignadas</th>
                                <th>Permisos</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($rol_permissions as $j)
                            <tr>
                                <td>
                                    <div class="form-check">
                                    <label class="form-check-label" for="inlineCheckbox1">{{ $j->menu_name }} / {{$j->description}}</label>
                                    </div>
                                </td>
                                <td class="text-center">
                                        @if ($j->can_query == null or $j->can_query == 0)
                                            <a href="{{ route('rol.can_query', ['role_id' => $id,'permission_id' => $j->permission_id, 'value' => '1']) }}"
                                                class="badge bg-danger"><i class="bi bi-x-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="No consultar"></i></a>
                                        @elseif($j->can_query == 1)
                                            <a href="{{ route('rol.can_query', ['role_id' => $id,'permission_id' => $j->permission_id, 'value' => '0']) }}"
                                                class="badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Consultar"><i class="bi bi-check-circle"></i></a>
                                        @endif
                              
                                        @if ($j->can_insert == null or $j->can_insert == 0)
                                            <a href="{{ route('rol.can_insert', ['role_id' => $id,'permission_id' => $j->permission_id, 'value' => '1']) }}"
                                                class="badge bg-danger"><i class="bi bi-x-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="No insertar"></i></a>
                                        @elseif($j->can_insert == 1)
                                            <a href="{{ route('rol.can_insert', ['role_id' => $id,'permission_id' => $j->permission_id, 'value' => '0']) }}"
                                                class="badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Insertar"><i class="bi bi-check-circle"></i></a>
                                        @endif
                              

                               
                                        @if ($j->can_update == null or $j->can_update == 0)
                                            <a href="{{ route('rol.can_update', ['role_id' => $id,'permission_id' => $j->permission_id, 'value' => '1']) }}"
                                                class="badge bg-danger"><i class="bi bi-x-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="No actualizar"></i></a>
                                        @elseif($j->can_update == 1)
                                            <a href="{{ route('rol.can_update', ['role_id' => $id,'permission_id' => $j->permission_id, 'value' => '0']) }}"
                                                class="badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Actualizar"><i class="bi bi-check-circle"></i></a>
                                        @endif
                               
                              
                                        @if ($j->can_delete == null or $j->can_delete == 0)
                                            <a href="{{ route('rol.can_delete', ['role_id' => $id,'permission_id' => $j->permission_id, 'value' => '1']) }}"
                                                class="badge bg-danger"><i class="bi bi-x-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="No deshabilitar/eliminar"></i></a>
                                        @elseif($j->can_delete == 1)
                                            <a href="{{ route('rol.can_delete', ['role_id' => $id,'permission_id' => $j->permission_id, 'value' => '0']) }}"
                                                class="badge bg-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Deshabilitar/Eliminar"><i class="bi bi-check-circle"></i></a>
                                        @endif
                               
                                
                            </td>
                            <td class="text-center">
                                <a href="{{ route('rol.remove', ['role_id' => $id, 'permission_id' => $j->permission_id]) }}"
                                    class="badge bg-danger"><i class="bi bi-x-lg"></i></a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div> 
            <div class="col-md-5">
                <table class="table table-bordered table-responsive table-condensed table-hover table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>Opciones Disponibles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($id)
                            @foreach ($not_permissions as $permission)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="permissions[]" value="{{ $permission->permission_id }}" />
                                        <label class="form-check-label" for="inlineCheckbox1">{{ $permission->menu_name }} / {{$permission->description}}</label>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="permissions[]" value="{{ $permission->permission_id }}" />
                                        <label class="form-check-label" for="inlineCheckbox1">{{ $permission->menu_name }} / {{$permission->description}}</label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div> {{-- row --}}
{{--
            <div class="row px-3">
                <h4 class="col-6">Asignados</h4>
                <h4 class="col-6">Disponibe</h4>

                <ul id="assigned" class="col-6 list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        <span class=""> Nombre del modulo</span>

                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                    id="inlineCheckbox1" value="{{ $permission->id }}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="{{ $permission->description }}" />
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                    id="inlineCheckbox1" value="{{ $permission->id }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="{{ $permission->description }}" />
                            </div>
                        </div>

                    </li>
                </ul>

                <ul id="available" class="col-6 list-group p-0">
                    <li class="list-group-item d-flex justify-content-between">
                        <span class=""> Nombre del modulo</span>

                        <div class="d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                    id="inlineCheckbox1" value="{{ $permission->id }}" data-bs-toggle="tooltip"
                                    title="{{ $permission->description }}" />
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                    id="inlineCheckbox1" value="{{ $permission->id }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="{{ $permission->description }}" />
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
--}}

</div>
   


<script>
    // $(function() {

    // })

    let assigned = /* Sortable.create( */ document.getElementById('assigned') /* ); */
    let available = /* Sortable.create( */ document.getElementById('available') /* ); */

    new Sortable(assigned, {
        group: 'shared', // set both lists to same group
        animation: 150
    });

    new Sortable(available, {
        group: 'shared',
        animation: 150
    });
</script>
