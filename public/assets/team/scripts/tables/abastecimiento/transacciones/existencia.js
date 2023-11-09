(function () {
    tableControlles.onDefineOperateEvents({
        event: "click",
        eventClass: ".remove",
        fun: function (e, value, row, index) {
            tableControlles.onDeleteTableRow({
                field: "sku",
                values: [row.sku],
            });
        },
    });
    tableControlles.setLoadModalContentOnClick("#modalExistencia")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-2,justify-content-center",
            },
            actions: (function() {   
                console.log(row)
                return tableControlles.setConditions(                 
                    row.sku != null 
                    ? [
                        {
                            name: 'edit',
                            iClass: "fa,fa-pencil",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `existencia/edit/${row.sku}/${row.periodo}`,
                            tooltip: { title: "Editar Existencia", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle de existencia", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalExistencia",
                                toggle: "modal",
                                url: `existencia/show/${row.sku}/${row.periodo}`,

                            },
                            
                            tooltip: {title:"Detalle Existencia", toggle: "tooltip",placement:"top"},
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
                field: "sku",
                title: "Catalogo",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "periodo",
                title: "Periodo",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "invInicial",
                title: "Inventario Inicial",
                sortable: true,
                align: "center",
                searchable: true                
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
                field: "merma",
                title: "Merma",
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