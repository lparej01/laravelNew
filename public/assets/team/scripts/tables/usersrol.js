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
    tableControlles.setLoadModalContentOnClick("#modalUsersRol")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-2,justify-content-center",
            },
            actions: (function() {   
                console.log(row)
                return tableControlles.setConditions(
                    row.username != null 
                    ? [
                        {
                            name: 'edit',
                            iClass: "fa,fa-pencil",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `usersrol/edit/${row.id}`,
                            tooltip: { title: "Editar usuario rol", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle del Users Rol", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalUsersRol",
                                toggle: "modal",
                                url: `usersrol/show/${row.id}`,
                            },
                            tooltip: {title:"Detalle Usuario rol", toggle: "tooltip",placement:"top"},
                        },
                       
                        {
                            iClass: "fa,fa-eraser",
                            aClass: "remove,btn,btn-danger",
                            href: `usersrol/delete/${row.id}`,
                            tooltip: {title:"Eliminar Relacion usuario rol", toggle: "tooltip",placement:"top"},
                            name: 'disable',
                            iClass: "fa,fa-eraser",
                            aClass: "btn,btn-danger,btn-icon-only",                           
                            modal: {
                                target: "#modalUsersRol",
                                toggle: "modal",
                                url: `usersrol/delete/${row.id}`,
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
                title: "Nombre del rol",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "username",
                title: "Nombre del usuario",
                sortable: true,
                align: "center",
                searchable: true,
            },

            {
                field: "estado",
                title: "Estado del usuario",
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
