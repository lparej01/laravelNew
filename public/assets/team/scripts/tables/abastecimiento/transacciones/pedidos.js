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
    tableControlles.setLoadModalContentOnClick("#modalPedidos")

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
                            href: `pedidos/edit/${row.pedidoId}`,
                            tooltip: { title: "Editar Pedidos", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle de pedidos", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalPedidos",
                                toggle: "modal",
                                url: `pedidos/show/${row.pedidoId}`,

                            },
                            
                            tooltip: {title:"Detalle Pedidos", toggle: "tooltip",placement:"top"},
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
                title: "Fecha Pedidos",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "sku",
                title: "Catálogo",
                sortable: true,
                align: "center",
                searchable: true                
            },
           /*  {
                field: "provId",
                title: "Proveedor",
                sortable: true,
                align: "center",
                searchable: true                
            }, */

            {
                field: "cant",
                title: "Cantidad",
                sortable: true,
                align: "center",
                searchable: true,
                
            },
           /*  {
                field: "costoUnitario",
                title: "Costo Unitario",
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
                field: "flete",
                title: "Flete",
                sortable: true,
                align: "center",
                searchable: true,
                
            }, 
            {
                field: "costoTotalFlete",
                title: "Costo de Flete",
                sortable: true,
                align: "center",
                searchable: true,
                
            },  */
            {
                field: "cantPendiente",
                title: "Cant. Pendiente",
                sortable: true,
                align: "center",
                searchable: true,
                
            }, 
            {
                field: "saldoPendiente",
                title: "Saldo Pendiente",
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