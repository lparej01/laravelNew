
<div class="d-flex flex-column gap-4  p-3 m-3">
   
    <div class="d-flex justify-content-between">
        <strong>Marca:</strong>
        {{ $catalogos->marca }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Categoria:</strong>
        {{ $catalogos->categoria }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Descripcion:</strong>
        {{ $catalogos->descripcion }}
    </div>
   
     <div class="d-flex justify-content-between">
        <strong>Presentacion:</strong>
        {{ $catalogos->presentacion }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Unidad de medida:</strong>
        {{ $catalogos->unidadMedida }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Empaque:</strong>
        {{ $catalogos->empaque }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Costo Unitario:</strong>
        {{ $catalogos->costoUnitario }}
    </div>
    
   
    

</div>