<div class="d-flex flex-column gap-4  p-3 m-3">
   
    <div class="d-flex justify-content-between">
        <strong>Combo: {{ $producto->comboId}} </strong>
        
    </div>
    <div class="d-flex " style="align-self: flex-start">
        <strong>Periodo: {{ $producto->periodo }}</strong>
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Inventario Inicial:{{ $producto->invInicial}}</strong>
       
    </div>
   
     <div class="d-flex justify-content-between">
        <strong>Entradas:  {{ $producto->entradas}}</strong>
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Salidas:  {{ $producto->salidas}}</strong>
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Merma:  {{ $producto->merma}}</strong>
       
    </div>
    <div class="d-flex justify-content-between">
        <strong>Inventario Final:  {{ $producto->invFinal}}</strong>
       
    </div>
    
   </div>
