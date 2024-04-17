<div class="d-flex flex-column gap-4  p-3 m-3">   

    <div class="d-flex justify-content-between">
        <strong>Identificador:</strong>
        {{ $despachos->pedidoId}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Fecha de la solicitud:</strong>
        {{ $despachos->fechaPedido}}
    </div>
    
    
    <div class="d-flex justify-content-between">
        <strong>SKU:</strong>
        {{ $despachos->sku}}
    </div>   
    <div class="d-flex justify-content-between">
        <strong>Cantidad Ingresada:</strong>
        {{ $despachos->cant}}
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Costo Total:</strong>
        {{ $despachos->costoTotal}}
    </div> 
   
    <div class="d-flex justify-content-between">
        <strong>Cantidad Pendiente:</strong>
        {{ $despachos->cantPendiente}}
    </div>
    
    
   
    

</div>