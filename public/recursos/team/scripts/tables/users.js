(function () {
    const ADMIN = 1;


    tableControlles.onDefineOperateEvents({
        event: "click",
        elementSelector: ".roleAssignament",
        fun: function (e, value, row, index) {
            tableControlles.setIdRow(row.id);
        },
    });
    tableControlles.onDefineOperateEvents({
        event: "click",
        elementSelector: ".disable",
        fun: function (e, value, row, index) {
            swal.fire({
                title: "¿Estás seguro de cambiar el estatus del usuario?",
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Si",
                cancelButtonText: "Cancelar",
                denyButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    var config = {
                        method: "get",
                        url: "http://127.0.0.1:8000/users/disable/" + row.id,
                    };

                    axios(config)
                        .then(function (response) {
                            tableControlles.onDeleteTableRow({
                                field: "id",
                                values: [row.id],
                            });

                            Swal.fire("Usuario Deshabilitado!", "", "success");
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else if (result.isDenied) {
                    Swal.fire("Changes U not saved", "", "info");
                }
            });
        },
    });

    tableControlles.setLoadModalContentOnClick("#modalUser");

    function operateFormatter(value, row, index) {
        const row_id = new String(row.id).trim();

        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-2,justify-content-center",
            },
            actions: (function () {
                console.log(row)
                return tableControlles.setConditions(
                    row.names != null
                        ? [
                            {
                                name: "edit",
                                iClass: "fa,fa-pencil",
                                aClass: "btn,btn-primary,btn-icon-only",
                                href: `user/edit/${row_id}`,
                                tooltip: {
                                    title: "Editar Usuario",
                                    toggle: "tooltip",
                                    placement: "top",
                                },
                            },

                            {
                                name: "assignment",
                                iClass: "fa,fa-user-edit",
                                aClass: "roleAssignament,btn,btn-primary,btn-icon-only",
                                tooltip: {
                                    title: "Asignar Rol a Usuario",
                                    toggle: "tooltip",
                                    placement: "bottom",
                                },
                                modal: {
                                    toggle: "modal",
                                    target: "#modalUser",
                                    url: `show/${row_id}`,
                                },
                            },
                            {
                                name: "disable",
                                iClass: "fa,fa-user-slash",
                                aClass: "btn,btn-danger,btn-icon-only",
                                href: `user/disable/${row_id}`,
                                tooltip: {
                                    title: "Deshabilitar Usuario",
                                    toggle: "tooltip",
                                    placement: "top",
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
                field: "id",
                title: "Identificador",
                sortable: true,
                align: "center",
                searchable: true,
            },


            {
                field: "username",
                title: "Nombre de Usuario",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "names",
                title: "Nombres",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "surnames",
                title: "Apellidos",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "email",
                title: "Correo electronico",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "images",
                title: "Foto",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "status",
                title: "Estatus",
                sortable: true,
                align: "center",
                searchable: true
               
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
