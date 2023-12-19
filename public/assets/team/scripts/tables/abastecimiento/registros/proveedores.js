(function () {
    tableControlles.onDefineOperateEvents({
        event: "click",
        eventClass: ".remove",
        fun: function (e, value, row, index) {
            tableControlles.onDeleteTableRow({
                field: "provId",
                values: [row.provId],
            });
        },
    });
    tableControlles.setLoadModalContentOnClick("#modalProveedores")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-2,justify-content-center",
            },
            actions: (function() {   
                console.log(row.provId)
                return tableControlles.setConditions(
                    row.nombre != null 
                    ? [
                        {
                            name: 'edit',
                            iClass: "fa,fa-pencil",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `proveedores/edit/${row.provId}`,
                            tooltip: { title: "Editar Proveedor", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle del Proveedor", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalProveedores",
                                toggle: "modal",
                                url: `proveedores/show/${row.provId}`,
                            },
                            tooltip: {title:"Detalle Proveedor", toggle: "tooltip",placement:"top"},
                        },
                        {
                            name: "disable",
                            iClass: "fa,fa-user-slash",
                            aClass: "btn,btn-danger,btn-icon-only",
                            href: `proveedores/disable/${row.provId}`,
                            tooltip: {
                                title:"Desactivar el proveedor", toggle: "tooltip",placement:"top"},
                                name: 'disable',
                                iClass: "fa,fa-eraser",
                                aClass: "btn,btn-danger,btn-icon-only",                           
                                modal: {
                                target: "#modalProveedores",
                                toggle: "modal",
                                url: `proveedores/disable/${row.provId}`,
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
                field: "provId",
                title: "Identificador",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "nombre",
                title: "Nombre  Proveedor",
                sortable: true,
                align: "left",
                searchable: true,
            },
            {
                field: "contacto",
                title: "Contacto",
                sortable: true,
                align: "right",
                searchable: true                
            },

           /*  {
                field: "telf1",
                title: "Telefono 1",
                sortable: true,
                align: "center",
                searchable: true,
                
            },
            {
                field: "telf2",
                title: "Telefono 2",
                sortable: true,
                align: "center",
                searchable: true,
                
            }, */
            {
                field: "telfContacto",
                title: "Telefono de Contacto",
                sortable: true,
                align: "center",
                searchable: true,
                
            },
           /*  {
                field: "email",
                title: "Correo Principal",
                sortable: true,
                align: "center",
                searchable: true,
                
            },  */
           
            {
                field: "emailContacto",
                title: "Correo Contacto",
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
