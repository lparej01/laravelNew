<div class="d-flex flex-column gap-4  p-3 m-3">
   
    <div class="d-flex justify-content-between">
        <strong>Número de proveedor:</strong>
        {{ $proveedor->provId }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Nombre:</strong>
        {{ $proveedor->nombre }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Nombre del contacto:</strong>
        {{ $proveedor->contacto }}
    </div>

    <div class="d-flex justify-content-between">
        <strong>Teléfonos:</strong>
        {{ $proveedor->telf1 }}
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Teléfonos :</strong>
        {{ $proveedor->telf2 }}
    </div>    
    <div class="d-flex justify-content-between">
        <strong>Teléfonos :</strong>
        {{ $proveedor->telfContacto }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Email:</strong>
        {{ $proveedor->email }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Email del contacto:</strong>
        {{ $proveedor->emailContacto }}
    </div>
    

</div>
