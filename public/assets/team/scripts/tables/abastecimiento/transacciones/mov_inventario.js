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
    tableControlles.setLoadModalContentOnClick("#modalMovimientoInventario")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-2,justify-content-center",
            },
            actions: (function() {   
                console.log(row)
                return tableControlles.setConditions(                 
                    row.movinvId != null 
                    ? [
                       /*  {
                            name: 'edit',
                            iClass: "fa,fa-pencil",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `movinv/edit/${row.movinvId}`,
                            tooltip: { title: "Editar Movimiento de Inventario", toggle: "tooltip",
                                placement: "top",
                            },
                        }, */
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle Movimiento de Inventario", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalMovimientoInventario",
                                toggle: "modal",
                                url: `movinv/show/${row.movinvId}`,

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
                field: "movinvId",
                title: "Identificador",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "sku",
                title: "Catálogo",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "tipoMovinv",
                title: "Tipo",
                sortable: true,
                align: "center",
                searchable: true                
            },
            {
                field: "fechaMovinv",
                title: "Fecha",
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
                field: "pedidoId",
                title: "Numero de Pedido",
                sortable: true,
                align: "center",
                searchable: true,
                
            }, 
            
           /*  {
                field: "referencia",
                title: "Referencia",
                sortable: true,
                align: "center",
                searchable: true,
                
            },            
             */
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