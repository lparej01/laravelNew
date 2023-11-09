{{-- <style>
    .select,
    #locale {
        width: 100%;
    }

    .like {
        margin-right: 10px;
    }
</style>
 --}}

<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6 col-7">
                @isset($title)
                    <h6>{{ $title }}</h6>
                @endisset
                <p class="text-sm mb-0">
                    @isset($captionIcon)
                        <i class="fa fa-{{ $captionIcon }} text-info" aria-hidden="true"></i>
                    @endisset
                    @isset($caption)
                        <span class="font-weight-bold ms-1"> {{ $caption }}</span>
                    @endisset
                </p>
                @isset($headerTitle)
                    <div>{{ $headerTitle }}</div>
                @endisset
            </div>
            <div class="col-lg-6 col-5 my-auto text-end">
                @isset($btnAction)
                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle cursor-pointer" type="button" id="dropdownActions"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $btnAction->title }}
                            @isset($btnAction->icon)
                                <i class="fa fa-{{ $btnAction->icon || 'ellipsis-v' }} text-secondary" aria-hidden="true"></i>
                            @endisset
                        </button>

                        @isset($btnAction->actions)
                            <ul class="dropdown-menu dropdown-menu-right shadow-lg px-2 py-3 ms-sm-n4 ms-n5"
                                aria-labelledby="dropdownActions">
                                @foreach ($btnAction->actions as $actions)
                                    <li>
                                        <a class="dropdown-item border-radius-md" href="javascript:;">{{ $actions->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endisset
                    </div>
                @else
                    <div>{{ $headerActions }}</div>
                @endisset
            </div>
        </div>
    </div>
   
    {{-- data-search-text="" --}}
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0"> 
              
            <table class="table align-items-center mb-0 "
                id={{ $dataId }}
                data-toolbar="#toolbar"
                data-toggle="table"
                data-data-type="text"
                data-strict-search={{ $dataStrictSearch }}
                data-search={{ $dataSearch }}
                data-search-accent-neutralise={{ $dataSearchAccentNeutralise }}
                data-search-align={{ $dataSearchAlign }} data-search-highlight={{ $dataSearchHighlight }}
                data-search-on-enter-key={{ $dataSearchOnEnterKey }}
                @isset($searchCustomSearch) data-custom-search={{ $searchCustomSearch }} @endisset
                @isset($searchSelector)  data-search-selector={{ $searchSelector }}  @endisset
                data-show-refresh={{ $dataShowRefresh }} data-show-toggle={{ $dataShowToggle }}
                data-show-fullscreen={{ $dataShowFullscreen }} data-show-columns={{ $dataShowColumns }}
                data-show-pagination-switch={{ $dataShowPaginationSwitch }}
                data-show-columns-toggle-all={{ $dataShowColumnsToggleAll }}
                @isset($dataPagination)
                data-pagination={{ $dataPagination }}
                @endisset
                {{-- @endif --}}
                data-id-field="id"
                @isset($dataHeight)
                    data-height={{ $dataHeight }}
                @endisset
                data-page-list="[10, 25, 50, 100, all]"
                {{-- data-side-pagination="server"   --}}
                {{-- data-url="https://examples.wenzhixin.net.cn/examples/bootstrap_table/data" --}} {{-- data-response-handler="responseHandler" --}}
                {{-- data-sort-priority="[{sortName: 'Item Name' 'sortOrder':'desc'},{sortName: 'Item Price' 'sortOrder':'desc'},{sortName: 'Item ID' 'sortOrder':'desc'}]" --}}>

                {{ $slot }}
            
            
            </table>
   
        </div> 
       
    </div>
    </div>
</div>

<script>
    var $tableInstanceInUse = $('#{{ $dataId }}');

    function renderTable(columns) {
        $tableInstanceInUse.bootstrapTable('destroy').bootstrapTable({
            data: {!! $data !!},
            columns: columns ?? []
        })
    }
</script>

<script src="{{ asset('/assets/scripts/useTables.js') }}"></script>

<script>
    var tableControlles = new TableControlles($tableInstanceInUse);    
</script>

@stack('scripts')

{{--
<script>
    var $table = $('#table')
    var $remove = $('#remove')
    var selections = []

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function(row) {
            return row.id
        })
    }

    function responseHandler(res) {
        $.each(res.rows, function(i, row) {
            row.state = $.inArray(row.id, selections) !== -1
        })
        return res
    }

    function detailFormatter(index, row) {
        var html = []
        $.each(row, function(key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>')
        })
        return html.join('')
    }

    function operateFormatter(value, row, index) {
        return [
            '<a class="like" href="javascript:void(0)" title="Like">',
            '<i class="fa fa-heart"></i>',
            '</a>  ',
            '<a class="remove" href="javascript:void(0)" title="Remove">',
            '<i class="fa fa-trash"></i>',
            '</a>'
        ].join('')
    }

    window.operateEvents = {
        'click .like': function(e, value, row, index) {
            alert('You click like action, row: ' + JSON.stringify(row))
        },
        'click .remove': function(e, value, row, index) {
            $table.bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
            })
        }
    }

    function totalTextFormatter(data) {
        return 'Total'
    }

    function totalNameFormatter(data) {
        return data.length
    }

    function totalPriceFormatter(data) {
        var field = this.field
        return '$' + data.map(function(row) {
            return +row[field].substring(1)
        }).reduce(function(sum, i) {
            return sum + i
        }, 0)
    }

    function customSearch(data, text) {
        return data.filter(function(row) {
            return row.price.indexOf(text) > -1
        })
    }

    async function initTable() {

        $table.bootstrapTable('destroy').bootstrapTable({
            height: 500,
            locale: $('#locale').val(),
            // data: {!! $data !!},
            search: true,
            formatSearch: function() {
                return 'Search Item Price'
            },
            columns: [
                [{
                    field: 'state',
                    checkbox: true,
                    rowspan: 2,
                    align: 'center',
                    valign: 'middle'
                }, {
                    title: 'Item ID',
                    field: 'id',
                    rowspan: 2,
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    footerFormatter: totalTextFormatter
                }, {
                    title: 'Item Detail',
                    colspan: 3,
                    align: 'center'
                }],
                [{
                    field: 'name',
                    title: 'Item Name',
                    sortable: true,
                    footerFormatter: totalNameFormatter,
                    align: 'center',
                    searchable: true
                }, {
                    field: 'price',
                    title: 'Item Price',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalPriceFormatter,
                    searchable: true
                }, {
                    field: 'operate',
                    title: 'Item Operate',
                    align: 'center',
                    clickToSelect: false,
                    events: window.operateEvents,
                    formatter: operateFormatter
                }]
            ]
        })

        $table.on('check.bs.table uncheck.bs.table ' +
            'check-all.bs.table uncheck-all.bs.table',
            function() {
                $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)

                // save your data, here just save the current page
                selections = getIdSelections()
                // push or splice the selections if you want to save all data selections
            })

        // $table.on('all.bs.table', function(e, name, args) {


        //     console.log({
        //         data: $table.data(),
        //         name,
        //         args
        //     })
        //     // customSearch()

        // })


        $remove.click(function() {
            var ids = getIdSelections()
            $table.bootstrapTable('remove', {
                field: 'id',
                values: ids
            })
            $remove.prop('disabled', true)
        })

    }

    $(function() {
        initTable()
        $('#locale').change(initTable)
    })
</script> --}}
