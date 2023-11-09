(function () {
    tableControlles.onDefineOperateEvents({
        event: "click",
        eventClass: ".remove",
        fun: function (e, value, row, index) {
            tableControlles.onDeleteTableRow({
                field: "id",
                values: [row.id],
            });
        },
    });
    tableControlles.setLoadModalContentOnClick("#modalMenu")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-2,justify-content-center",
            },
            actions: (function() {   
                console.log(row.icono)
                return tableControlles.setConditions(
                    row.nombre != null 
                    ? [
                        {
                            name: 'edit',
                            iClass: "fa,fa-pencil",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `menu/edit/${row.id}`,
                            tooltip: { title: "Editar Menu", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle del Menu", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalMenu",
                                toggle: "modal",
                                url: `menu/show/${row.id}`,
                            },
                            tooltip: {title:"Detalle Menu", toggle: "tooltip",placement:"top"},
                        },
                       
                        {
                            iClass: "fa,fa-eraser",
                            aClass: "remove,btn,btn-danger",
                            href: `menu/delete/${row.id}`,
                            tooltip: {title:"Eliminar Menu", toggle: "tooltip",placement:"top"},
                            name: 'disable',
                            iClass: "fa,fa-eraser",
                            aClass: "btn,btn-danger,btn-icon-only",                           
                            modal: {
                                target: "#modalMenu",
                                toggle: "modal",
                                url: `menu/delete/${row.id}`,
                            }
                        },
                    ]
                    : [],
                )
                
            })()
        });
    }

    renderTable([
        [
            {
                field: "id",
                title: "Identificador",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "menu_id",
                title: "Menu",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "nombre",
                title: "Nombre del Menu",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "url",
                title: "Url",
                sortable: true,
                align: "center",
                searchable: true,
                
            },
            {
                field: "tipo",
                title: "Tipo de Menu",
                sortable: true,
                align: "center",
                searchable: true,
                
            },
            {
                field: "icono",
                title: "Icono",
                sortable: true,
                align: "center",
                searchable: true,
                sortname: 'image',               
                formatter: function show_image(value, row) {
                    if(row.icono != null ){
                        console.log(row.icono);                   
                    return '<img src ="../storage/'+ row.icono +' " width="30" height="30" >';

                    }
                    

                   
                },
                
            },
            
            {
                field: "actions",
                title: "Acciones",
                align: "center",
                clickToSelect: false,
                events: tableControlles.operateEvents,
                formatter: operateFormatter,
            }
        ],
    ]);
})();
