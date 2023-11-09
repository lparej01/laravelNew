
<div class="d-flex flex-column gap-4  p-3 m-3">
   

    <div class="d-flex justify-content-between">
        <strong>Sku o Catálogo:</strong>
        {{ $existencia->sku}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Periodo:</strong>
        {{ $existencia->periodo}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Inventario Inicial:</strong>
        {{ $existencia->invInicial}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Entrada:</strong>
        {{ $existencia->entradas}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Salidas:</strong>
        {{ $existencia->salidas}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Merma:</strong>
        {{ $existencia->merma}}
    </div>
   
    
    <div class="d-flex justify-content-between">
        <strong>Inventario Final:</strong>
        {{ $existencia->invFinal}}
    </div>
    
   
    

</div>