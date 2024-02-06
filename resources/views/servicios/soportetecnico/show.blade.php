<div class=".d-lg-inline-flex flex-column gap-4  p-3 m-3">
   
    <div class=".d-lg-inline-flex justify-content-between">
        <strong>Indentificador:</strong>
        {{ $soporte->id }}
    </div>
    <div class=".d-lg-inline-flex justify-content-between">
        <strong>Nombre de Usuarios:</strong>
        {{$soporte->usuarios }}
    </div>

    <div class=".d-lg-inline-flex justify-content-between">
        <strong>Departamento:</strong>
        {{ $soporte->departamentos }}
    </div>

    <div class=".d-lg-inline-flex justify-content-between" >
        <strong>Incidencia:</strong>
        {{ $soporte->incidencias }}
    </div>
    <div class=".d-lg-inline-flex justify-content-between">
        <strong>Comentario:</strong>
        {{$soporte->comentario }}
    </div>

</div>
