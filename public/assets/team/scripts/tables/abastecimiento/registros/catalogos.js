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
    tableControlles.setLoadModalContentOnClick("#modalCatalogos")

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
                            href: `catalogos/edit/${row.sku}`,
                            tooltip: { title: "Editar Catalogos", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle del catalogos", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalCatalogos",
                                toggle: "modal",
                                url: `catalogos/show/${row.sku}`,

                            },
                            tooltip: {title:"Detalle Catalogos", toggle: "tooltip",placement:"top"},
                        },
                       /*  {
                            name: "disable",
                            iClass: "fa,fa-user-slash",
                            aClass: "btn,btn-danger,btn-icon-only",
                            href: `catalogos/disable/${row.sku}`,
                            tooltip: {
                                title:"Desactivar el Catalogos", toggle: "tooltip",placement:"top"},
                                name: 'disable',
                                iClass: "fa,fa-eraser",
                                aClass: "btn,btn-danger,btn-icon-only",                           
                                modal: {
                                target: "#modalCatalogos",
                                toggle: "modal",
                                url: `catalogos/disable/${row.sku}`,
                            },


                       }, */

                       {
                        iClass: "fa,fa-eraser",
                        aClass: "remove,btn,btn-danger",
                        href: `catalogos/delete/${row.id}`,
                        tooltip: {title:"Eliminar Sku", toggle: "tooltip",placement:"top"},
                        name: 'delete',
                        iClass: "fa,fa-eraser",
                        aClass: "btn,btn-danger,btn-icon-only",                           
                        modal: {
                            target: "#modalCatalogos",
                            toggle: "modal",
                            url: `catalogos/delete/${row.id}`,
                        }
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
                title: "Identificador",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "catId",
                title: "Categorias",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "marca",
                title: "Marca",
                sortable: true,
                align: "left",
                searchable: true                
            },

            {
                field: "descripcion",
                title: "Descripcion",
                sortable: true,
                align: "left",
                searchable: true,
                
            },
            {
                field: "presentacion",
                title: "Presentación",
                sortable: true,
                align: "center",
                searchable: true,
                
            }, 
            
            {
                field: "unidadMedida",
                title: "Unidad de Medida",
                sortable: true,
                align: "center",
                searchable: true,
                
            },  
            {
                field: "empaque",
                title: "Empaque",
                sortable: true,
                align: "center",
                searchable: true,
                
            },  
            {
                field: "costoUnitario",
                title: "Costo Unitario",
                sortable: true,
                align: "center",
                searchable: true,
                
            },          
            {
                field: "activo",
                title: "Estado",
                sortable: true,
                align: "center",
                searchable: true,              
                formatter: function nameFormatter(value, row) {
                    return value ? "Activo" : "Inactivo";
                },
                
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