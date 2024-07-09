(function () {
    tableControlles.onDefineOperateEvents({
        event: "click",
        eventClass: ".remove",
        fun: function (e, value, row, index) {
            tableControlles.onDeleteTableRow({
                field: "planId",
                values: [row.planId],
            });
        },
    });
    tableControlles.setLoadModalContentOnClick("#modalMovimientosProductos")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-3,justify-content-center",
            },
            actions: (function() {   
                console.log(row)
                return tableControlles.setConditions(                 
                    row.movterId != null 
                    ? [
                        
                        {
                            name: 'edit',
                            iClass: "fa,fa-pencil",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `movter/edit/${row.movterId}`,
                            tooltip: { title: "Reporte de planes de entrega", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle del movimientos", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalMovimientosProductos",
                                toggle: "modal",
                                url: `movter/show/${row.movterId}`,

                            },
                            
                            tooltip: {title:"Detalle del movimiento", toggle: "tooltip",placement:"top"},
                        },                                        
                        {
                            iClass: "fa,fa-eraser",
                            aClass: "remove,btn,btn-danger",
                            href: `movter/delete/${row.movterId}`,
                            tooltip: {title:"Eliminar el Movimientos", toggle: "tooltip",placement:"top"},
                            name: 'delete',
                            iClass: "fa,fa-eraser",
                            aClass: "btn,btn-danger,btn-icon-only",                           
                            modal: {
                                target: "#modalMovimientosProductos",
                                toggle: "modal",
                                url: `movter/delete/${row.movterId}`,
                            },
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
                field: "movterId",
                title: "Movimiento Id ",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "comboId",
                title: "Combo",
                sortable: true,
                align: "left",
                searchable: true,
            },
            {
                field: "tipoMovter",
                title: "Tipo de Mov.",
                sortable: true,
                align: "center",
                searchable: true,
            }, 
            {
                field: "fechaMovter",
                title: "Fecha del Mov",
                sortable: true,
                align: "center",
                searchable: true,
            }, 
            {
                field: "cant",
                title: "Cantidad del Movimiento",
                sortable: true,
                align: "center",
                searchable: true,
            },   
            {
                field: "planId",
                title: "Plan",
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

