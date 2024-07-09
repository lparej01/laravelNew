(function () {
    tableControlles.onDefineOperateEvents({
        event: "click",
        eventClass: ".remove",
        fun: function (e, value, row, index) {
            tableControlles.onDeleteTableRow({
                field: "catId",
                values: [row.catId],
            });
        },
    });
    tableControlles.setLoadModalContentOnClick("#modalCategorias")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-2,justify-content-center",
            },
            actions: (function() {   
                console.log(row)
                return tableControlles.setConditions(
                    row.catId != null 
                    ? [
                        {
                            name: 'edit',
                            iClass: "fa,fa-pencil",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `categorias/edit/${row.catId}`,
                            tooltip: { title: "Editar Categorias", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle del Categorias", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalCategorias",
                                toggle: "modal",
                                url: `categorias/show/${row.catId}`,
                            },
                            tooltip: {title:"Detalle Categorias", toggle: "tooltip",placement:"top"},
                        },
                         {
                            name: "disable",
                            iClass: "fa,fa-user-slash",
                            aClass: "btn,btn-danger,btn-icon-only",
                            href: `categorias/disable/${row.catId}`,
                            tooltip: {
                                title:"Desactivar el Categorias", toggle: "tooltip",placement:"top"},
                                name: 'disable',
                                iClass: "fa,fa-eraser",
                                aClass: "btn,btn-danger,btn-icon-only",                           
                                modal: {
                                target: "#modalCategorias",
                                toggle: "modal",
                                url: `categorias/disable/${row.catId}`,
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
                field: "catId",
                title: "Identificador",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "categoria",
                title: "Nombre de las Categorías",
                sortable: true,
                align: "left",
                searchable: true,
            },
            {
                field: "costoUnitario",
                title: "Costo unitario",
                sortable: true,
                align: "center",
                searchable: true                
            },

            {
                field: "precio",
                title: "Precio",
                sortable: true,
                align: "center",
                searchable: true,
                
            },
            {
                field: "peso",
                title: "Peso",
                sortable: true,
                align: "center",
                searchable: true,
                
            },           
            /* {
                field: "activo",
                title: "Estado",
                sortable: true,
                align: "center",
                searchable: true,
                formatter: function nameFormatter(value, row) {
                    return value ? "Activo" : "Inactivo";
                },
                
            },        */
            
            
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
