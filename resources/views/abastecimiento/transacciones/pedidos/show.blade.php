<div class="d-flex flex-column gap-4  p-3 m-3">   

    <div class="d-flex justify-content-between">
        <strong>Identificador:</strong>
        {{ $pedidos->pedidoId}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Fecha Pedido:</strong>
        {{ $pedidos->fechaPedido}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Codigo del Proveedor:</strong>
        {{ $pedidos->provId }}
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Proveedor:</strong>
        {{ $pedidos->nombre }}
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Codigo Catálogo:</strong>
        {{ $pedidos->sku}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Catálogo:</strong>
        {{ $pedidos->marca}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Cantidad Ingresada:</strong>
        {{ $pedidos->cant}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Costo Unitario:</strong>
        {{ $pedidos->costoUnitario}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Costo Total:</strong>
        {{ $pedidos->costoTotal}}
    </div>  
    
    <div class="d-flex justify-content-between">
        <strong>Flete:</strong>
        {{ $pedidos->flete}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Total Flete:</strong>
        {{ $pedidos->costoTotalFlete}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Cantidad Pendiente:</strong>
        {{ $pedidos->cantPendiente}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Saldo Pendiente:</strong>
        {{ $pedidos->saldoPendiente}}
    </div>
    
   
    

</div>