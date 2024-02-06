  function obtenerPedidos (){  
    const data = {
         sku :document.getElementById('selectsku').value,
         tipo: document.getElementById('tipoMovinv').value
         }    
         if (data.tipo == 0) {
          alert("Tiene que selecionar un tipo");
          
         }
         if (data.sku == 0) {
          alert("Tiene que selecionar un sku");
          
         }         
       
        $.ajax({ 
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'entrada_salida', 
            dataType: 'JSON',                 
            type: 'GET',                    
            data: data,
            success: function (response) {

            if (response) {          
              
              
              let pedido = response.lista;
              let reg='No hay registro';             
                  pedido.forEach(element => {
                      let opcion= document.createElement("option");
                      opcion.id= element.pedidoId;               
                    
                      if (pedido.length) {
                        opcion.innerHTML='<option> Pedido Nro:'+ element.pedidoId + ' => Cantidad maxima :' +  element.cant+ ' </option>';
                        document.querySelector("#ped").append(opcion);
                        
                      } 
                      
                      
                  });

                   
                  if (pedido.length) {
                    let sku = response.lista[0].sku;                  
                    document.getElementById("sku").value =sku;
                   }
                  if (!pedido.length) {

                    
                    $("#selectsku").change(function(event) {
                      $("#ped option").remove();
                      $('#sku').val('  ');

                    });

                    let opc= document.createElement("option");
                    opc.innerHTML='<option value="0" selected="selected">No hay elementos</option>';           
                    document.querySelector("#ped").append(opc);                  
                    $('#sku').val('  ');

                   
                    


                  
                   }
                           
            } else {
              console.log("no tiene datos");
            }
             
              
              },            
             
        });

    

    }





