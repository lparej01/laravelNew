function obtenerPedidosCosto (){  
        const data = {
         costo :document.getElementById('costoUnitario').value,
         cant: document.getElementById('cant').value
         }           
        
        
       
        $.ajax({ 
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'costtotal', 
            dataType: 'JSON',                 
            type: 'get',                    
            data: data,
            success: function (response) {

            if (response) {   
              
              
              let costottal = response.lista;
              let reg='No hay registro'; 
              console.log(costottal);
              document.getElementById('costoTotal').value=costottal;
                    
            } else {
              console.log("no tiene datos");
            }
             
              
              },            
             
        });

    

    }
    function obtenerTotalFlete (){  
        const data = {
         costototal :document.getElementById('costoTotal').value,
         flete: document.getElementById('flete').value
         }           
        
       
        $.ajax({ 
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'totalflete', 
            dataType: 'JSON',                 
            type: 'get',                    
            data: data,
            success: function (response) {

            if (response) {   
              
              
              let totalFlete = response.lista;
              let reg='No hay registro'; 
              console.log(totalFlete);
              document.getElementById('costoTotalFlete').value=totalFlete;
                    
            } else {
              console.log("no tiene datos");
            }
             
              
              },            
             
        });

    

    }


