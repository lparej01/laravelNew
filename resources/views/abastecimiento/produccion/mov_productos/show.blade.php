<div class="d-flex flex-column gap-4  p-3 m-3">
   
    <div class="d-flex justify-content-between">
        <strong>Mov Id: {{ $movter->movterId}} </strong>
        
    </div>
    <div class="d-flex " style="align-self: flex-start">
        <strong>Nro de Combo: {{ $movter->comboId }}</strong>
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Tipo de movimiento:{{ $movter->tipoMovter}}</strong>
       
    </div>
   
     <div class="d-flex justify-content-between">
        <strong>Fecha del Movimiento:  {{ $movter->fechaMovter}}</strong>
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Cantidad:  {{ $movter->cant}}</strong>
       
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Nro Plan:  {{ $movter->planId}}</strong>
       
    </div>
    
   </div>