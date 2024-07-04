<div class="d-flex flex-column gap-4  p-3 m-3">   

    <div class="d-flex justify-content-between">
        <strong>Identificador:</strong>
        {{ $pedidos->pedidoId}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Fecha pedido:</strong>
        {{ $pedidos->fechaPedido}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Código del proveedor:</strong>
        {{ $pedidos->provId }}
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Proveedor:</strong>
        {{ $pedidos->nombre }}
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Código catálogo:</strong>
        {{ $pedidos->sku}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>catálogo:</strong>
        {{ $pedidos->marca}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Cantidad ingresada:</strong>
        {{ $pedidos->cant}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Costo unitario:</strong>
        {{ $pedidos->costoUnitario}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Costo total:</strong>
        {{ $pedidos->costoTotal}}
    </div>  
    
    <div class="d-flex justify-content-between">
        <strong>Flete:</strong>
        {{ $pedidos->flete}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Total flete:</strong>
        {{ $pedidos->costoTotalFlete}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Cantidad pendiente:</strong>
        {{ $pedidos->cantPendiente}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Saldo pendiente:</strong>
        {{ $pedidos->saldoPendiente}}
    </div>
    
   
    

</div>