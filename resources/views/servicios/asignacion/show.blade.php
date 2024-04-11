<div class="d-flex flex-column gap-4  p-3 m-3">
   
    <div class="d-flex justify-content-between">
        <strong>Indentificador:</strong>
        {{ $data->id }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Nombre del Equipo :</strong>
        {{ $data->nombre_equipo  }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Estado :</strong>
        {{ $data->Status }}
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Oficina :</strong>
        {{ $data->oficina  }}
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Tipo de Equipo :</strong>
        {{ $data->tipo_equipo }}
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Equipo Asignado :</strong>
        {{ $data->equipo_asignado_person }}
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Sistema Operativo :</strong>
        {{ $data->sistema_oper }}
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Tipo de Procesador :</strong>
        {{ $data->tipo_procesador }}
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Memoria Ram:</strong>
        {{ $data->memoria_ram }}
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Disco :</strong>
        {{ $data->disco }}
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Dominio del Sistema :</strong>
        {{ $data->dominio }}
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Any Desk:</strong>
        {{$data->any_desk  }}
    </div>
    

    <div class="d-flex justify-content-between">
        <strong>Correo :</strong>
        {{ $data->correo_electronico }}
    </div>
    
   
    

</div>
