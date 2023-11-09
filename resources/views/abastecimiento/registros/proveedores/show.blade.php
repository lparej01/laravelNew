<div class="d-flex flex-column gap-4  p-3 m-3">
   
    <div class="d-flex justify-content-between">
        <strong>Numero de Proveedor:</strong>
        {{ $proveedor->provId }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Nombre:</strong>
        {{ $proveedor->nombre }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Nombre del Contacto:</strong>
        {{ $proveedor->contacto }}
    </div>

    <div class="d-flex justify-content-between">
        <strong>Telefonos:</strong>
        {{ $proveedor->telf1 }}
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Telefonos :</strong>
        {{ $proveedor->telf2 }}
    </div>    
    <div class="d-flex justify-content-between">
        <strong>Telefonos :</strong>
        {{ $proveedor->telfContacto }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Email:</strong>
        {{ $proveedor->email }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Email del Contacto:</strong>
        {{ $proveedor->emailContacto }}
    </div>
    

</div>
