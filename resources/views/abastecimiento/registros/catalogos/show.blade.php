
<div class="d-flex flex-column gap-4  p-3 m-3">   
    <div class="d-flex justify-content-between">
        <strong>Marca:</strong>
        {{ $catalogos->marca }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Categoría:</strong>
        {{ $catalogos->categoria }}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Descripción:</strong>
        {{ $catalogos->descripcion }}
    </div>
   
     <div class="d-flex justify-content-between">
        <strong>Presentación:</strong>
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
        <strong>Costo unitario:</strong>
        {{ $catalogos->costoUnitario }}
    </div>
    
   
    

</div>