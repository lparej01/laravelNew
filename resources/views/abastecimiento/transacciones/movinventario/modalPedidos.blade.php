<!-- Modal -->
<div class="modal fade" id="pedidoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pedidos por Sku</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">          
            

          @if (empty($pedido))

                @foreach ($pedido as $item)

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    $item->pedidoId
                    <label class="form-check-label" for="flexRadioDefault1">
                    
                    </label>
                  </div>
    
                @endforeach
               
            
               
           @else

                 <div class="form-check">
                    <label for="">No hay datos</label>
                    </label>
                  </div>
               
           @endif
                    
                
         
           
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

