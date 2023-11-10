

<div class="d-flex flex-column gap-4  p-3 m-3">
   

    <div class="d-flex justify-content-between">
        <strong>Sku o Catálogo:</strong>
        {{ $movinv->sku}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Tipo de movimiento inventario:</strong>
        {{ $movinv->tipoMovinv}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Fecha del Movimiento:</strong>
        {{ $movinv->fechaMovinv}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Cantidad:</strong>
        {{ $movinv->cant}}
    </div>
    <div class="d-flex justify-content-between">
        <strong>Pedido:</strong>
        {{ $movinv->pedidoId}}
    </div>
   
   
    

</div>