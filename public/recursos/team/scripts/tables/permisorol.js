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
    tableControlles.setLoadModalContentOnClick("#modalPermisoRol")

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
                            href: `permisorol/edit/${row.id}`,
                            tooltip: { title: "Editar Permiso Rol", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle del Permiso Rol", toggle: "tooltip",placement:"top"},                           
                            modal: {
                                target: "#modalPermisoRol",
                                toggle: "modal",
                                url: `permisorol/show/${row.id}`,
                            },
                            tooltip: {title:"Detalle Permiso Rol", toggle: "tooltip",placement:"top"},
                        },
                       
                        {
                            iClass: "fa,fa-eraser",
                            aClass: "remove,btn,btn-danger",
                            href: `permisorol/delete/${row.id}`,
                            tooltip: {title:"Eliminar Permiso Rol", toggle: "tooltip",placement:"top"},
                            name: 'disable',
                            iClass: "fa,fa-eraser",
                            aClass: "btn,btn-danger,btn-icon-only",                           
                            modal: {
                                target: "#modalPermisoRol",
                                toggle: "modal",
                                url: `permisorol/delete/${row.id}`,
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
                field: "rol",
                title: "Rol",
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
                field: "estado",
                title: "Estado del permiso",
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
