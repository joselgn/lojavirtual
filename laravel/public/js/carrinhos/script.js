var scriptJS = {
    acaoItem : function(idCarrinho,idLista,acao){
        //acao => p = Add 1 item / m => remove 1 item / c => cancela/exclui tods o item

        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: top.baseURL+'/ajax-carrinho-item',
            dataType: "json",
            data: {
                id_carrinho : idCarrinho,
                id          : idLista,
                acao        : acao
            },
            success: function (data) {
                var erro =data.erro;

                if(erro===0){
                    //Atualiza os campos html
                    switch (data.acao) {
                        case 'm':
                            $('#totalItensSpan').html(data.itensCarrinho);
                            $('#appendedInputButtons_'+data.id).val(data.qde);
                            $('#precototal_'+data.id).html(data.valorLista);
                            $('#precofinal').html(data.valorTotal);
                        break
                        case 'p':
                            $('#totalItensSpan').html(data.itensCarrinho);
                            $('#appendedInputButtons_'+data.id).val(data.qde);
                            $('#precototal_'+data.id).html(data.valorLista);
                            $('#precofinal').html(data.valorTotal);
                        break
                        case 'c':
                            $('#totalItensSpan').html(data.itensCarrinho);
                            $('#precofinal').html(data.valorTotal);
                            $('#linha_'+data.id).remove();
                        break
                    }//switch acao
                }//if erro

            }//success ajax
        });//AJAX
    },//acao itens
};//JS
