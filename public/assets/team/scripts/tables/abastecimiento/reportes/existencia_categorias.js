

function tableExistencia(){      
                    

    var periodo = document.getElementById('fechaPeriodo').value;
    


    $.ajax({ 
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'generar_categoria', 
        dataType: 'JSON',                 
        type: 'GET',                    
        data: periodo,
        success: function (response) 
        {

              if (response){      
              
              
                     let existencia = response.lista;  
                     
                     console.log(existencia);
                  
                      existencia.forEach(element => {
                      let tr= document.createElement("tr");                              
                                              
                      
                      tr.innerHTML='<td>'+ element.sku + ' </td><td>' +  element.periodo + ' </td>';
                          document.querySelector("#exis").append(tr);
                  
                      });

            }
              
         }
      }); 


   }
  


