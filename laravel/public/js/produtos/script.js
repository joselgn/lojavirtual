var scriptJS = {
    grid : function(){
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: 'ajax-produto-grid',
            dataType: "json",
            data: {},
            success: function (data) {
                var source = {
                    datatype: "json",
                    datafields: [
                        {name: 'nome',  type: 'string'},
                        {name: 'ativo', type: 'string'},
                        {name: 'preco', type: 'string'},
                        {name: 'edit',  type: 'number'}
                    ],
                    cache:false,
                    root:'Rows',
                    sort: function () {
                        // update the grid and send a request to the server.
                        $("#grid-lista").jqxGrid('updatebounddata', 'sort');
                    },
                    beforeprocessing: function (data) {
                        source.totalrecords = data.TotalRows;
                    },
                    localdata: data
                };//source

                var dataAdapter = new $.jqx.dataAdapter(source,{
                        //Set the http header before calling the api.
                        beforeSend: function (jqXHR, settings) {
                            jqXHR.setRequestHeader('X-CSRF-Token',$('meta[name="csrf-token"]').attr('content')); }
                });//data adapter

                $("#grid-lista").jqxGrid({
                    width:      '100%',
                    source:     dataAdapter,
                    pageable:   true,
                    autoheight: true,
                    sortable:   true,
                    altrows:    true,
                    virtualmode:false,
                    enabletooltips: true,
                    //viewrecords:true,
                    editable:   false,
                    filterable: true,
                    //selectionmode: 'multiplecellsadvanced',
                    localization: jqxJS.traduzir(),
                    showcolumnheaderlines: true,
                    rendergridrows: function (params) {
                        return params.data;
                    },
                    columns: [
                        {
                            text: 'Nome',
                            columngroup: 'title',
                            datafield: 'nome',
                            align: 'center',
                            cellsalign: 'left',
                            width: '40%'
                        },
                        {
                            text: 'Preço',
                            columngroup: 'title',
                            datafield: 'preco',
                            align: 'center',
                            cellsalign: 'center',
                            width: '25%'
                        }, {
                            text: 'Status',
                            columngroup: 'title',
                            datafield: 'ativo',
                            align: 'center',
                            cellsalign: 'center',
                            width: '25%'
                        },
                        {
                            text: 'Editar',
                            columngroup: 'title',
                            datafield: 'edit',
                            align: 'center',
                            cellsalign: 'center',
                            width: '10%'
                        }
                    ],
                    columngroups: [
                        {text: 'LISTA', align: 'center', name: 'title'}
                    ]
                });//grid
            }//success ajax
        });//AJAX
    },//start Grid
    delete : function(){
        var id = $('#id').val();

        if(confirm('Tem certeza que deseja deletar esse item?')) {
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '../ajax-produto-delete',
                dataType: "json",
                data: {
                    id : id,
                    _method:'delete'
                },
                success: function (data) {
                    var erro = data.erro;
                    var msg  = data.msg;

                    window.location='../lista-produtos'
                }//success
            });//AJAX
        }//if confirm
    },//delete
    comboCaracteristicas : function(){
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '../ajax-caracteristica-busca',
            dataType: "json",
            data: {
                ativo : 1
            },
            success: function (data) {
                var config = {
                    datatype: "json",
                    datafields: [
                        {name: 'nome',  type: 'string'},
                        {name: 'id',    type: 'number'}
                    ],
                    //cache:false,
                    //root:'Rows',
                    localdata: data
                };//config

                var source = new $.jqx.dataAdapter(config);
                $("#comboCaracteristicas").jqxComboBox({source: source, multiSelect: true, displayMember: "nome", valueMember: "id", width: 350, height: 30});
            }//success
        });//Ajax
    },//Combo Caracteristicas
    comboCategorias : function(){
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '../ajax-categoria-busca',
            dataType: "json",
            data: {
                ativo : 1
            },
            success: function (data) {
                var config = {
                    datatype: "json",
                    datafields: [
                        {name: 'nome',  type: 'string'},
                        {name: 'id',    type: 'number'}
                    ],
                    //cache:false,
                    //root:'Rows',
                    localdata: data
                };//config

                var source = new $.jqx.dataAdapter(config);
                $("#comboCategorias").jqxComboBox({source: source, multiSelect: true, displayMember: "nome", valueMember: "id", width: 350, height: 30});
            }//success
        });//Ajax
    },//Combo Caracteristicas
};//JS
