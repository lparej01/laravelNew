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
    tableControlles.setLoadModalContentOnClick("#modalAsignacion")

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
                            href: `asignacion/edit/${row.id}`,
                            tooltip: { title: "Editar Asignacion", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle de asignacion", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalAsignacion",
                                toggle: "modal",
                                url: `asignacion/show/${row.id}`,
                            },
                            tooltip: {title:"Detalle asignacion", toggle: "tooltip",placement:"top"},
                        },
                       
                        {
                            iClass: "fa,fa-eraser",
                            aClass: "remove,btn,btn-danger",
                            href: `asignacion/delete/${row.id}`,
                            tooltip: {title:"Eliminar asignacion", toggle: "tooltip",placement:"top"},
                            name: 'disable',
                            iClass: "fa,fa-eraser",
                            aClass: "btn,btn-danger,btn-icon-only",                           
                            modal: {
                                target: "#modalAsignacion",
                                toggle: "modal",
                                url: `asignacion/delete/${row.id}`,
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
                field: "equipo_asignado_person",
                title: "Equipo asignado",
                sortable: true,
                align: "left",
                searchable: true,
            }, 
            {
                field: "tipo_equipo",
                title: "Tipo de equipo",
                sortable: true,
                align: "left",
                searchable: true,
            },             
            {
                field: "oficina",
                title: "Ubicación del Equipo",
                sortable: true,
                align: "left",
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
