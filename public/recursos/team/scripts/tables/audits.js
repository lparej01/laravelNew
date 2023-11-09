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
    tableControlles.setLoadModalContentOnClick("#modalAuditorias")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-2,justify-content-center",
            },
           
        });
    }

    renderTable([
        [
           {
                field: "id",
                title: "Id",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "user_type",
                title: "Tipo de Usuario",
                sortable: true,
                align: "left",
                searchable: true,
            },
            {
                field: "user_id",
                title: "Usuario",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "event",
                title: "Evento",
                sortable: true,
                align: "center",
                searchable: true,
            },
             {
                field: "auditable_type",
                title: "Tipo auditable",
                sortable: true,
                align: "left",
                searchable: true,
            },
             {
                field: "auditable_id",
                title: "Auditable id",
                sortable: true,
                align: "center",
                searchable: true,
            },
             {
                field: "old_values",
                title: "Valores viejos",
                sortable: true,
                align: "center",
                searchable: true,
            },
             {
                field: "new_values",
                title: "Nuevos valores",
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
                field: "ip_address",
                title: "Direccion Ip",
                sortable: true,
                align: "center",
                searchable: true,
            },
             {
                field: "user_agent",
                title: "Agente de usuario",
                sortable: true,
                align: "center",
                searchable: true,
            },
             {
                field: "tags",
                title: "Etiquetas",
                sortable: true,
                align: "center",
                searchable: true,
            },
             {
                field: "created_at",
                title: "Fecha registrada",
                sortable: true,
                align: "center",
                searchable: true,
            },
             {
                field: "updated_at",
                title: "Fecha actualizada",
                sortable: true,
                align: "center",
                searchable: true,
            },
            
            
        ],
    ]);
})();
                           