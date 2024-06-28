<div class="container"> 
    <div class="card"> 
        <div class="container mx-5 my-4">            
            <div class="row">
                <div class=" form-group col-3"> 
                  {{ Form::label('Nombre del Combo (*)') }}
                  <input type="text" id="descCombo"  name ="descCombo" class="form-control"  autocomplete placeholder="Nombre del combo">                 
                   
                    {!! $errors->first('descCombo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                 <div class=" form-group col-3">
                  {{ Form::label('peso total del combo (*)') }}
                  {{ Form::text('peso', null, ['class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''),  "id" => "peso","name" => "peso","placeholder" => "Peso del Combo" ,'readonly']) }}   
                    {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class=" form-group col-3">
                  {{ Form::label('') }}
                  <button id="add-record-button" style="width: 250px" class="btn btn-primary ">Agregar</button>
                </div>  
             </div>


            <table id="combo" class="table" style="width: 80%">              
                  <thead>
                    <tr>            
                    <th>Categoria</th>
                    <th>Peso</th> 
                    <th>Unidades</th>
                    </tr>
                  </thead>
                  <tbody id="body">
                 
                      @foreach ($categorias as $item)
                        <tr>                       
                        <td>
                          <input  type="hidden" name="cat_{{$item->catId}}" class="form-control" value="{{$item->catId}}">
                          {{$item->categoria}}
                         {{--  <input type="text"   name ="categ_{{$item->catId}}" class="form-control" value="{{$item->categoria}}" readonly > --}}
                        </td>
                        <td>
                          {{$item->peso}}
                          {{-- <input type="number" data-value="peso"  name ="peso_{{$item->catId}}" class="form-control peso" value="{{$item->peso}}" readonly > --}}
                          </td>
                        <td>       
                            <input type="number"   name="{{$item->catId}}"   id="sdd{{$item->catId}}"  style="width: 200px" maxlength="3"     class="form-control numeros"  placeholder="solo numeros">
                        </td>
                      </tr>
                      @endforeach
                 </tbody>
            </table>
    </div>
</div>
  <script>
  //funcion anonima
   $(function(){
  
      var cont =0;
      var n=1;
      var input;      
      var mult = 0;    
      var tr ;
      var celda ;
      /*
      *Busquedad por el input selecionado con la clase numeros
      */
      $(".numeros").on('change', function() {
      
     
           input = $(this).val(); 
           input =  parseInt(input); //valor del input    
            /* buscar la fila selecionada */
            tr =  $(this).parents("tr").find("td");
            /*celda a calcular*/
            celda = parseFloat(tr[1].innerHTML); //el peso para calcular  
            mult = input * celda;        
            
            cont = cont + mult; 

            document.getElementById('peso').value = parseFloat(cont);
           

            n = n + 1;      

      })
      

    });     
      

     
 
      
  </script>


 