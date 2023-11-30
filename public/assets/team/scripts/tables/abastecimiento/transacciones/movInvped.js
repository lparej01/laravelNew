(function () {
  tableControlles.onDefineOperateEvents({
      event: "click",
      eventClass: ".remove",
      fun: function (e, value, row, index) {
          tableControlles.onDeleteTableRow({
              field: "movinvId",
              values: [row.movinvId],
          });
      },
  });
  tableControlles.setLoadModalContentOnClick("#modalMovimientoInventarioPed")

  function operateFormatter(value, row, index) {
      return tableControlles.onCreateActions({
          container: {
              class: "d-flex,gap-2,justify-content-center",
          },
          actions: (function() {   
              console.log(row)
              return tableControlles.setConditions(                 
                  row.pedidoId != null 
                  ? [
                       {
                          name: 'edit',
                          iClass: "fa,fa-pencil",
                          aClass: "btn,btn-primary,btn-icon-only",
                          href: `movinv/edit/${row.pedidoId}`,
                          tooltip: { title: "Incluir pedido  al movimiento de Inventario", toggle: "tooltip",
                              placement: "top",
                          },
                      }, 
                      {
                          name: 'show',
                          iClass: "fa,fa-eye",
                          aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                          tooltip: {title:"Ver detalle Movimiento de Inventario", toggle: "tooltip",placement:"top"},
                          modal: {
                              target: "#modalMovimientoInventarioPed",
                              toggle: "modal",
                              url: `movinv/show/${row.pedidoId}`,

                          },
                          
                          tooltip: {title:"Detalle movinv", toggle: "tooltip",placement:"top"},
                      },                      
                    



                  ]
                  : []
          );
      })(),
  });
}
  renderTable([
      [
          {
              field: "pedidoId",
              title: "Numero de Pedido",
              align: "center",
              valign: "middle",
              sortable: true,
          },
          {
              field: "fechaPedido",
              title: "Fecha del Pedido",
              sortable: true,
              align: "center",
              searchable: true,
          },
          {
              field: "sku",
              title: "Sku",
              sortable: true,
              align: "center",
              searchable: true                
          },
          {
            field: "descripcion",
            title: "nombre del sku",
            sortable: true,
            align: "center",
            searchable: true                
        },
          {
              field: "cant",
              title: "Cantidad",
              sortable: true,
              align: "center",
              searchable: true                
          }, 

          {
              field: "cantPendiente",
              title: "Cantidad Pendiente",
              sortable: true,
              align: "center",
              searchable: true,
              
          },
           
          {
              field: "actions",
              title: "Acciones",
              align: "center",
              clickToSelect: false,
              events: tableControlles.operateEvents,
              formatter: operateFormatter,
          },
      ],
  ]);

 
})();