(function () {
    tableControlles.onDefineOperateEvents({
        event: "click",
        eventClass: ".remove",
        fun: function (e, value, row, index) {
            tableControlles.onDeleteTableRow({
                field: "pedidoId",
                values: [row.pedidoId],
            });
        },
    });
    tableControlles.setLoadModalContentOnClick("#modalDespachos")

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
                            href: `despachos/edit/${row.pedidoId}`,
                            tooltip: { title: "Editar despachos", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle de despachos", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalDespachos",
                                toggle: "modal",
                                url: `despachos/show/${row.pedidoId}`,

                            },
                            
                            tooltip: {title:"Detalle  despachos", toggle: "tooltip",placement:"top"},
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
                title: "Identificador",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "fechaPedido",
                title: "Fecha del Despacho",
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
                field: "cant",
                title: "Cantidad",
                sortable: true,
                align: "center",
                searchable: true,
                
            },           
           {
                field: "costoTotal",
                title: "Costo Total",
                sortable: true,
                align: "center",
                searchable: true,
                
            },            
         
            {
                field: "cantPendiente",
                title: "Cant. Pendiente",
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