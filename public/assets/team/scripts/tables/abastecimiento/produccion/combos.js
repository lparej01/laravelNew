(function () {
    tableControlles.onDefineOperateEvents({
        event: "click",
        eventClass: ".remove",
        fun: function (e, value, row, index) {
            tableControlles.onDeleteTableRow({
                field: "comboId",
                values: [row.combosId],
            });
        },
    });
    tableControlles.setLoadModalContentOnClick("#modalCombos")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-2,justify-content-center",
            },
            actions: (function() {   
                console.log(row)
                return tableControlles.setConditions(                 
                    row.comboId != null 
                    ? [
                        {
                            name: 'assignment',
                            iClass: "fa,fa-arrows",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `combos/assignment/${row.comboId}`,
                            tooltip: { title: "Seleccione el tipo de plan", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'edit',
                            iClass: "fa,fa-pencil",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `combos/edit/${row.comboId}`,
                            tooltip: { title: "Editar el Combo", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle de combos", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalCombos",
                                toggle: "modal",
                                url: `combos/show/${row.comboId}`,

                            },
                            
                            tooltip: {title:"Detalle Combos", toggle: "tooltip",placement:"top"},
                        },
                        {
                            iClass: "fa,fa-eraser",
                            aClass: "remove,btn,btn-danger",
                            href: `combos/delete/${row.comboId}`,
                            tooltip: {title:"Eliminar Combos", toggle: "tooltip",placement:"top"},
                            name: 'delete',
                            iClass: "fa,fa-eraser",
                            aClass: "btn,btn-danger,btn-icon-only",                           
                            modal: {
                                target: "#modalCombos",
                                toggle: "modal",
                                url: `combos/delete/${row.comboId}`,
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
                field: "comboId",
                title: "Id",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "descCombo",
                title: "Nombre del Combo",
                sortable: true,
                align: "center",
                searchable: true,
            },
            {
                field: "peso",
                title: "Peso (Kg)",
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

