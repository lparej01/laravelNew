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
    tableControlles.setLoadModalContentOnClick("#modalPermiso")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-2,justify-content-center",
            },
            actions: (function() {   
                return tableControlles.setConditions(
                    row.nombre != null 
                    ? [
                        {
                            name: 'edit',
                            iClass: "fa,fa-pencil",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `permiso/edit/${row.id}`,
                            tooltip: { title: "Editar Permiso", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle del Permiso", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalPermiso",
                                toggle: "modal",
                                url: `permiso/show/${row.id}`,
                            },
                            tooltip: {title:"Detalle Permiso", toggle: "tooltip",placement:"top"},
                        },
                       
                        {
                            iClass: "fa,fa-eraser",
                            aClass: "remove,btn,btn-danger",
                            href: `permiso/delete/${row.id}`,
                            tooltip: {title:"Eliminar Permiso", toggle: "tooltip",placement:"top"},
                            name: 'disable',
                            iClass: "fa,fa-eraser",
                            aClass: "btn,btn-danger,btn-icon-only",                           
                            modal: {
                                target: "#modalPermiso",
                                toggle: "modal",
                                url: `permiso/delete/${row.id}`,
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
                field: "nombre",
                title: "Permiso",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "status",
                title: "Estado del permiso",
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
