<script src="{{asset("assets/team/js/toastr.min.js")}}" type="text/javascript"></script>
<link href="{{ asset("assets/team/css/toastr.min.css")}}" rel="stylesheet" type="text/css" />
<script src="{{asset("assets/team/funciones.js")}}" type="text/javascript"></script>
<div class="d-flex flex-column gap-4  p-3 m-3">
 
  <div class="d-flex justify-content-between">
      <strong>Plan: {{ $planes[0]->planId }} </strong>
      
  </div>
  <div class="d-flex " style="align-self: flex-start">
      <strong>Combo: {{ $combo->descCombo }}</strong>
     
  </div>
  <div class="d-flex justify-content-between">
      <strong>Cantidad de Combos: {{ $planes[0]->cantCombosPlan }} Unidades</strong>
     
  </div>
 
   <div class="d-flex justify-content-between">
      <strong>Peso:  {{ $combo->peso }} Kg</strong>
     
  </div>
  
  <div class="form-check  " style="align-self: flex-start">
     <strong>Entrega solicitado</strong>
     @foreach ($planes as $it)
      @if ($it->stRequisicion > 0)
      <input class="form-check-input"  type="checkbox" id="despachosolic" onclick="strequisicion()" checked>
      <input   type="hidden" id="plan" value="{{ $planes[0]->planId }}">
      
      @else
      <input class="form-check-input"   type="checkbox" id="despachosolic" onclick="strequisicion()">
      <input  type="hidden" id="plan" value="{{ $planes[0]->planId }}">
      @endif
     @endforeach
     <input   type="hidden" id="comboId" value="{{ $combo->comboId}}">
     <input   type="hidden" id="cantCombosPlan" value="{{ $planes[0]->cantCombosPlan}}">
     <input   type="hidden" id="pl" value="{{ $planes[0]->planId }}">
 </div>
 <div class="dropdown d-flex justify-content-between">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
   Receta solicitada
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      @foreach ($planes as $item)
    <li><a class="dropdown-item" href="#">{{  $item->categoria ." =>". $item->unidades }}</a></li>
    @endforeach
  </ul>
 </div>



          <script>

              function strequisicion() {
              
                  var stRequisicion = document.getElementById('despachosolic').checked;

                  var stenviar=0;

                  if (stRequisicion == false) {           
                      stenviar = 1;
                  
                  //  Biblioteca.notificaciones(stRequisicion, 'Despacho solicitado', 'info')
                  
                      
                  } else {
                      stenviar = 0;
                  // Biblioteca.notificaciones(stRequisicion, 'Desactivar despacho', 'info')
                  
                  }
                  const data = {
                  stenviar : stenviar,
                  plan: document.getElementById('plan').value


              
                  }
                  
                  $.ajax({ 
                          headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                          url:'planes-strequisicion', 
                          dataType: 'JSON',                 
                          type: 'GET',                    
                          data: data,
                          success: function (response) {

                          if (response) {        
                          
                          
                          Biblioteca.notificaciones(response, 'Cambio efectuado', 'success');   
                          let st = response.lista;          
                          
                      
                          } else {
                          console.log("no tiene datos");
                          }
                          
                          
                          },            
                          
                  });    
              


              }  

          </script>
          <script>
              function reportaProd(){
                      const data = {       
                      comboId: document.getElementById('comboId').value
                      
                  
                      }
                  if (data.comboId > 0) {
                      $('#modalPlanesProduccion').modal('hide');

                      $('#exampleModal').modal({ show:true });
                  } else {
                      
                  }           
                  $.ajax({ 
                          headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                          url:'planes-reporta-produccion', 
                          dataType: 'JSON',                 
                          type: 'GET',                    
                          data: data,
                          success: function (response) {

                          /// $('#modalPlanesProduccion').modal('hide');
                          }
                  });    
              
                  

              }  

          </script>
