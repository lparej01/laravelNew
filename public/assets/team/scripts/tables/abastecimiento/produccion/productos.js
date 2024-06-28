(function () {
    tableControlles.onDefineOperateEvents({
        event: "click",
        eventClass: ".remove",
        fun: function (e, value, row, index) {
            tableControlles.onDeleteTableRow({
                field: "comboId",
                values: [row.comboId],
            });
        },
    });
    tableControlles.setLoadModalContentOnClick("#modalProductos")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-3,justify-content-center",
            },
            actions: (function() {   
                console.log(row)
                return tableControlles.setConditions(                 
                    row.comboId != null 
                    ? [
                        
                        {
                            name: 'edit',
                            iClass: "fa,fa-pencil",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `productos/edit/${row.comboId}`,
                            tooltip: { title: "Editar producto", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalledel producto", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalProductos",
                                toggle: "modal",
                                url: `productos/show/${row.comboId}`,

                            },
                            
                            tooltip: {title:"Detalle planes produccion", toggle: "tooltip",placement:"top"},
                        },                                        
                        {
                            iClass: "fa,fa-eraser",
                            aClass: "remove,btn,btn-danger",
                            href: `productos/delete/${row.comboId}`,
                            tooltip: {title:"Eliminar Productos", toggle: "tooltip",placement:"top"},
                            name: 'delete',
                            iClass: "fa,fa-eraser",
                            aClass: "btn,btn-danger,btn-icon-only",                           
                            modal: {
                                target: "#modalProductos",
                                toggle: "modal",
                                url: `productos/delete/${row.comboId}`,
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
                field: "comboId",
                title: "Nro Combo",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "periodo",
                title: "Periodo",
                sortable: true,
                align: "left",
                searchable: true,
            },
            {
                field: "invInicial",
                title: "Inventario Inicial",
                sortable: true,
                align: "center",
                searchable: true,
            }, 
            {
                field: "entradas",
                title: "Entradas",
                sortable: true,
                align: "center",
                searchable: true,
            }, 
            {
                field: "salidas",
                title: "Salidas",
                sortable: true,
                align: "center",
                searchable: true,
            }, 
            {
                field: "invFinal",
                title: "Inventario Final",
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

