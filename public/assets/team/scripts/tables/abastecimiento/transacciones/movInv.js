function vereficarCantidad(){  
    const data = {
     ped :document.getElementById('ped').value,
     tipo: document.getElementById('tipoMovinv').value
     
     }   
     
     alert(data.ped);
       
   
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
          
          let codigo = 300000;
          let pedido = response.lista;
          
          let reg='No hay registro';             
              pedido.forEach(element => {
                  let opcion= document.createElement("option"); 
                 
                  opcion.id= element.pedidoId;                       
                  if (pedido.length) {                
               
                
                  if (element.provId == codigo) {
                    opcion.innerHTML='<option> Solicitud de Despacho:'+ element.pedidoId + ' => Cantidad por despachar :' +  element.cantPendiente + ' </option>';
                    document.querySelector("#ped").append(opcion);
                    
                  } 
                  else{
                    opcion.innerHTML='<option> Pedido Nro:'+ element.pedidoId + ' => Cantidad por Recepcion:' +  element.cant + ' </option>';
                    document.querySelector("#ped").append(opcion);
                    
                  } 
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

function buscarPedido(){ 

  const data = {
  pedido :document.getElementById('ped').value,
  
  }
  $.ajax({ 
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: 'buscar/pedido', 
      dataType: 'JSON',                 
      type: 'GET',                    
      data: data,
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

function obtenerPedidos(){  

 
 const data = {
  sku :document.getElementById('selectsku').value,
  tipo: document.getElementById('tipoMovinv').value
  } 
  if (data.tipo == 0) {
  // alert("Tiene que selecionar un tipo");
   Biblioteca.notificaciones(data.tipo, 'Seleccione el tipo de movimiento', 'info')
   
  }
  if (data.sku == 0) {
   //alert("Tiene que selecionar un sku");
   Biblioteca.notificaciones(data.sku, 'Seleccione el Sku', 'info')
  }         

 $.ajax({ 
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     url: 'entrada_salida', 
     dataType: 'JSON',                 
     type: 'GET',                    
     data: data,
     success: function (response) 
     {

       let arr = response.lista.length;
       let opc= document.createElement("option");
            
        if (arr > 0 ) {
         /**Se vacia el select */   
         $("#ped").empty(); 
           
         let primero = response.lista[0].provId; 
         let sku =response.lista[0].sku;
          if (primero ==300000 ) {          
             
             //let codigo = 300000;                            
            //let reg ='No hay registro';        
            opc.value = '';
            opc.innerHTML='Seleccione un pedido' ; 
            document.querySelector("#ped").append(opc); 
             response.lista.forEach(element => {                 
                
                    
                let opcion= document.createElement("option");
                opcion.value = element.pedidoId;                        
                opcion.innerHTML='Pedido:'+ element.pedidoId + ' Cantidad a despachar :' +  element.cantPendiente + '  Sku:'+ element.sku ;                       
                document.querySelector("#ped").append(opcion);                
                document.getElementById('sku').value = sku;        
                   
                  
             });
 
            
          }  
          if (primero != 300000 ) {  
            opc.value = '';
            opc.innerHTML='Seleccione un pedido' ; 
            document.querySelector("#ped").append(opc); 

            response.lista.forEach(element => {
                    
                  
                let opcion= document.createElement("option");                  
                opcion.value = element.pedidoId;        
                opcion.innerHTML='Pedido:'+ element.pedidoId + ' Cantidad por Recepción :' + element.cant +  '  Sku:'+ element.sku ;                    
                document.querySelector("#ped").append(opcion);
                document.getElementById('sku').value = sku;      
                   
                
                
            });       
            
            
            
            
          }

        }else{         
            $("#ped").empty(); 
            document.getElementById('sku').value = '';
            document.getElementById('cant').value = '';  
            let opcion= document.createElement("option"); 
            opcion.innerHTML='No tiene datos' ;
            document.querySelector("#ped").append(opcion);
      
        }
     }
    });            
      
}


    