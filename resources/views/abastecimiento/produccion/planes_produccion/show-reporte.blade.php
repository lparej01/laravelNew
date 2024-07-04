<div class="d-flex flex-column gap-4  p-3 m-3">
   
    <div class="d-flex justify-content-between">
        <strong>Plan: {{ $planid->planId }} </strong>
        
    </div>
    <div class="d-flex " style="align-self: flex-start">
        <strong>Número de combo: {{ $planid->comboPlanId }}</strong>
       
    </div>
    <div class="d-flex " style="align-self: flex-start">
        <strong>Nombre de combo: {{ $planid->descCombo }}</strong>
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Cantidad de combos: {{ $planid->cantCombosPlan }} Unidades</strong>       
    </div> 
    
    </div>