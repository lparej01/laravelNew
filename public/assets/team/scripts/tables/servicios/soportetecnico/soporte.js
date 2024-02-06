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
    tableControlles.setLoadModalContentOnClick("#modalSoporte")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-2,justify-content-center",
            },
            actions: (function() {   
                console.log(row);
                return tableControlles.setConditions(
                    row.usuarios != null 
                    ? [
                        {
                            name: 'edit',
                            iClass: "fa,fa-pencil",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `soportetecnico/edit/${row.id}`,
                            tooltip: { title: "Editar Soporte Tecnico", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle del SoporteTecnico", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalSoporte",
                                toggle: "modal",
                                url: `soportetecnico/show/${row.id}`,
                            },
                            tooltip: {title:"Detalle Soporte tecnico", toggle: "tooltip",placement:"top"},
                        },
                       
                        {
                            iClass: "fa,fa-eraser",
                            aClass: "remove,btn,btn-danger",
                            href: `soportetecnico/delete/${row.id}`,
                            tooltip: {title:"Eliminar Sporte tecnico", toggle: "tooltip",placement:"top"},
                            name: 'disable',
                            iClass: "fa,fa-eraser",
                            aClass: "btn,btn-danger,btn-icon-only",                           
                            modal: {
                                target: "#modalSoporte",
                                toggle: "modal",
                                url: `soportetecnico/delete/${row.id}`,
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
                title: "Nro:",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "usuarios",
                title: "Personas - Unidad solicitante",
                sortable: true,
                align: "left",
                searchable: true,
            },   
             {
                field: "departamentos",
                title: "Departamentos",
                sortable: true,
                align: "left",
                searchable: true,
            },    
            {
                field: "incidencias",
                title: "Incidencias",
                sortable: true,
                align: "left",
                searchable: true,
            },
            {
                field: "status",
                title: "Estado",
                sortable: true,
                align: "left",
                searchable: true
               
            },  
           /*  {
                field: "comentario",
                title: "Comentario",
                sortable: true,
                align: "left",
                searchable: true,
            },  */
            {
                field: "created_at",
                title: "Fecha",
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
