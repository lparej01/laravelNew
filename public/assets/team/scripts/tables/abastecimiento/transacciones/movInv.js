  function obtenerPedidos (){       
      const data = {
                  sku:document.getElementById('sku').value
                  
              }

        $.ajax({ 
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'create/mov_pedido',                  
            type: 'post',                    
            data: data,
            success: function (response) {

            if (response) {

              console.log('ok');
             
              $('#pedidoModal').modal('show');
              
            } else {
              console.log("no tiene datos");
            }
             
              
              },            
              error: function() {
                
                console.log("Error al buscar los datos");
              }
        });

    

    }





