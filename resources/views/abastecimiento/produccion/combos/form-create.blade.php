

<div class="container"> 
    <div class="card"> 
        <div class="container mx-5 my-4">
            <div class="row"></div>
                <h4>Agregar Combo</h4>
                <input type="text" class="form-control-sm mx-3 col-3" id="combo" placeholder="Nombre del Combo">
                <input type="text" class="form-control-sm mx-3 col-3" id="peso" placeholder="Peso" disabled="">
                <button id="add-record-button" class="btn btn-primary col-2">Agregar</button>
                <button id="cancel-changes" class="btn btn-primary col-2">Regresar</button>
            </div>


    <table class="table" style="width: 80%">
        <tbody>
            <thead><tr>               
            <th>Id</th>
            <th>Categoria</th>
            <th>Peso</th> 
            <th>Unidades</th>
          </tr>
           </thead>
           @foreach ($categorias as $item)
            <tr >
            <td style="width: 20px">{{$item->catId}}</td>
            <td style="width: 30px" >{{$item->categoria}}</td>
            <td style="width: 10px">{{$item->peso}}</td>
            <td style="width: 60px">       
                <input style="width: 200px" maxlength="3" class="name" style="align-content: center" type="number" onblur="calcular()"  id="{{$item->catId}}" class="form-control"  placeholder="solo numeros">
            </td>
           </tr>
           @endforeach
    </tbody>
    </table>
</div>
<script>
function calcular(){ 
    $("input").on( "change", function() {
     var input = $(this).attr("value");
   
  });

   
$.ajax({ 
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: 'buscar/pedido', 
    dataType: 'JSON',                 
    type: 'GET',                    
    data: input,
    success: function (response) {

    if (response) {          
      
      let codigo = 300000;
      let pedido = response.lista;
      //console.log(pedido.cant)
      
      document.getElementById('cant').value = pedido.cant;      
         

            
                   
    } else {
      document.getElementById('cant').value = '';  
      console.log("no tiene datos");
    }
     
      
      },            
     
});


}

</script>
</div>

 