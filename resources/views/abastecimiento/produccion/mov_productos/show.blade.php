<div class="d-flex flex-column gap-4  p-3 m-3">
   
    <div class="d-flex justify-content-between">
        <strong>Mov Id: {{ $movter->movterId}} </strong>
        
    </div>
    <div class="d-flex " style="align-self: flex-start">
        <strong>Número de combo: {{ $movter->comboId }}</strong>
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Tipo de movimiento:{{ $movter->tipoMovter}}</strong>
       
    </div>
   
     <div class="d-flex justify-content-between">
        <strong>Fecha del movimiento:  {{ $movter->fechaMovter}}</strong>
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Cantidad:  {{ $movter->cant}}</strong>
       
    </div>
    
    <div class="d-flex justify-content-between">
        <strong>Número de plan:  {{ $movter->planId}}</strong>
       
    </div>
    
   </div>