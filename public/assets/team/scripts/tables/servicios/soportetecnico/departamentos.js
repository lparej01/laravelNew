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
    tableControlles.setLoadModalContentOnClick("#modalDepartamentos")

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
                            href: `departamentos/edit/${row.id}`,
                            tooltip: { title: "Editar Departamentos", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle de la Departamentos", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalDepartamentos",
                                toggle: "modal",
                                url: `departamentos/show/${row.id}`,
                            },
                            tooltip: {title:"Detalle departamentos", toggle: "tooltip",placement:"top"},
                        },
                       
                        {
                            iClass: "fa,fa-eraser",
                            aClass: "remove,btn,btn-danger",
                            href: `departamentos/delete/${row.id}`,
                            tooltip: {title:"Eliminar departamentos", toggle: "tooltip",placement:"top"},
                            name: 'disable',
                            iClass: "fa,fa-eraser",
                            aClass: "btn,btn-danger,btn-icon-only",                           
                            modal: {
                                target: "#modalDepartamentos",
                                toggle: "modal",
                                url: `departamentos/delete/${row.id}`,
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
                title: "Departamentos",
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
