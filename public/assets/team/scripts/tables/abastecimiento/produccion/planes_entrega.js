(function () {
    tableControlles.onDefineOperateEvents({
        event: "click",
        eventClass: ".remove",
        fun: function (e, value, row, index) {
            tableControlles.onDeleteTableRow({
                field: "planId",
                values: [row.planId],
            });
        },
    });
    tableControlles.setLoadModalContentOnClick("#modalPlanesEntrega")

    function operateFormatter(value, row, index) {
        return tableControlles.onCreateActions({
            container: {
                class: "d-flex,gap-3,justify-content-center",
            },
            actions: (function() {   
                console.log(row)
                return tableControlles.setConditions(                 
                    row.planId != null 
                    ? [
                        
                        {
                            name: 'edit',
                            iClass: "fa,fa-pencil",
                            aClass: "btn,btn-primary,btn-icon-only",
                            href: `planes-entrega/edit/${row.planId}`,
                            tooltip: { title: "Reporte de planes de entrega", toggle: "tooltip",
                                placement: "top",
                            },
                        },
                        {
                            name: 'show',
                            iClass: "fa,fa-eye",
                            aClass: "roleAssignament,btn,btn-primary,btn-icon-only",                            
                            tooltip: {title:"Ver detalle de planes entrega", toggle: "tooltip",placement:"top"},
                            modal: {
                                target: "#modalPlanesEntrega",
                                toggle: "modal",
                                url: `planes-entrega/show/${row.planId}`,

                            },
                            
                            tooltip: {title:"Detalle planes entrega", toggle: "tooltip",placement:"top"},
                        },                                        
                        {
                            iClass: "fa,fa-eraser",
                            aClass: "remove,btn,btn-danger",
                            href: `planes-entrega/delete/${row.planId}`,
                            tooltip: {title:"Eliminar Plan de Entrega", toggle: "tooltip",placement:"top"},
                            name: 'delete',
                            iClass: "fa,fa-eraser",
                            aClass: "btn,btn-danger,btn-icon-only",                           
                            modal: {
                                target: "#modalPlanesEntrega",
                                toggle: "modal",
                                url: `planes-entrega/delete/${row.planId}`,
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
                field: "planId",
                title: "Plan",
                align: "center",
                valign: "middle",
                sortable: true,
            },
            {
                field: "descCombo",
                title: "Combo",
                sortable: true,
                align: "left",
                searchable: true,
            },
            {
                field: "tipoPlan",
                title: "Tipo de Plan",
                sortable: true,
                align: "center",
                searchable: true,
            }, 
            {
                field: "fechaPlan",
                title: "Fecha del Plan",
                sortable: true,
                align: "center",
                searchable: true,
            }, 
            {
                field: "cantCombosPlan",
                title: "Cantidad de Combos",
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

