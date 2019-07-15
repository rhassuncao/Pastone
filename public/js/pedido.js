var contadorItens = 0;

function pedidoTemItem(){
	
	for(totalItens2 = 0; totalItens2 <= contadorItens; totalItens2++){
		
		var countItensPedidoTem = 0;
		
		if (document.getElementById("observacao" + totalItens2) === null){
			
		} else {
			
			countItensPedidoTem++;
		}
	}
	
	if(countItensPedidoTem > 0){
		
		return true;
		
	} else {
		
		return false;
	}
}

function insereItensPedido(pedidoId){
    
    for(totalItens = 0; totalItens <= contadorItens; totalItens++){
        
        if (document.getElementById("observacao" + totalItens) === null) {
            
        } else {
            
            if(document.getElementById("produto" + totalItens + 2) === null){
                
                //se for um produto simples
                $.ajax({
                    
                    url: 'ajaxCriaItem.php',
                    data: {
                        produtoId: document.getElementById("produto" + totalItens + 1).value,
                        pedidoId: pedidoId,
                        observacao: document.getElementById("observacao" + totalItens).value,
                    },
                    async: false,
                    type: 'POST',
                    
                    success: function(resposta) {
                        
                    },
                });
                
            } else {
                
                var maiorProdutoId = 0;
                var maiorPreco = 0;
                
                $.ajax({
                    
                    url: 'buscaPrecoProduto.php',
                    data: {
                        produto: $('#produto' + totalItens + 1).val()
                    },
                    async: false,
                    type: 'POST',
                    
                    success: function(valorItem1) {
                        
                        console.log("Valor do item 1: " + valorItem1);
                        
                        if(valorItem1 != '') {
                            
                            maiorPreco = valorItem1;
                            maiorProdutoId = $('#produto' + totalItens + 1).val();
                        }
                        
                        $.ajax({
                            
                            url: 'buscaPrecoProduto.php',
                            data: {
                                produto: $('#produto' + totalItens + 2).val()
                            },
                            async: false,
                            type: 'POST',
                            
                            success: function(valorItem2) {
                                
                                if(valorItem2 != '') {
                                    
                                    if(parseFloat(valorItem2) > parseFloat(maiorPreco)){
                                        
                                        maiorPreco = valorItem2;
                                        maiorProdutoId = $('#produto' + totalItens + 2).val();
                                        
                                    }
                                }
                                
                                $.ajax({
                                    
                                    url: 'buscaPrecoProduto.php',
                                    data: {
                                        produto: $('#produto' + totalItens + 3).val()
                                    },
                                    async: false,
                                    type: 'POST',
                                    
                                    success: function(valorItem3) {
                                        
                                        if(valorItem3 != '') {
                                            
                                            if(parseFloat(valorItem3) > parseFloat(maiorPreco)){
                                                
                                                maiorPreco = valorItem3;
                                                maiorProdutoId = $('#produto' + totalItens + 3).val();
                                            }
                                        }
                                        
                                        $.ajax({
                                            
                                            url: 'buscaPrecoProduto.php',
                                            data: {
                                                produto: $('#produto' + totalItens + 4).val()
                                            },
                                            async: false,
                                            type: 'POST',
                                            
                                            success: function(valorItem4) {
                                                
                                                if(valorItem4 != '') {
                                                    
                                                    if(parseFloat(valorItem4) > parseFloat(maiorPreco)){
                                                        
                                                        maiorPreco = valorItem4;
                                                        maiorProdutoId = $('#produto' + totalItens + 4).val();
                                                        
                                                    }
                                                }
                                                
                                                var observacaoMeia = $('#observacao' + totalItens).val();
                                                
                                                if(valorItem4 != '') {
                                                    
                                                    observacaoMeia = " parte " 
                                                        + $('#produto' + totalItens + 4).find(":selected").text()
                                                        + ", " 
                                                        + observacaoMeia;
                                                }
                                                
                                                if(valorItem3 != '') {
                                                    
                                                    observacaoMeia = " parte " 
                                                        + $('#produto' + totalItens + 3).find(":selected").text()
                                                        + ", " 
                                                        + observacaoMeia;
                                                }
                                                
                                                if(valorItem2 != '') {
                                                    
                                                    observacaoMeia = " parte " 
                                                        + $('#produto' + totalItens + 2).find(":selected").text()
                                                        + ", " 
                                                        + observacaoMeia;
                                                }
                                                
                                                if(valorItem1 != '') {
                                                    
                                                    observacaoMeia = " parte " 
                                                        + $('#produto' + totalItens + 1).find(":selected").text()
                                                        + ", " 
                                                        + observacaoMeia;
                                                }
                                                
                                                $.ajax({
                                                    
                                                    url: 'ajaxCriaItem.php',
                                                    data: {
                                                        produtoId: maiorProdutoId,
                                                        pedidoId: pedidoId,
                                                        observacao: observacaoMeia,
                                                    },
                                                    async: false,
                                                    type: 'POST',
                                                    
                                                    success: function(resposta) {
                                                        
                                                    },
                                                });
                                            },
                                        });  
                                    },
                                }); 
                            },
                        });
                    },
                });
            }
        }
    }
}

function atualizaSelectProdutos(categoriaId){
    
    var produto    = '#produto'   + categoriaId;
    var preco      = 'preco'      + categoriaId;
    
    $.ajax({
        
        url: 'buscaProdutosCategoria.php',
        data: {
            categoria: $('#categoria' + categoriaId).val()
        },
        type: 'POST',
        
        success: function(resposta) {
            
            $(produto+'1').html(resposta);
            $(produto+'2').html(resposta);
            $(produto+'3').html(resposta);
            $(produto+'4').html(resposta);
        },
    });
    
    document.getElementById(preco).value = "R$ 0,00"; 
}
 
function atualizaPrecoProduto(produtoId){
    
    var itemNumero = produtoId + '';
    itemNumero = itemNumero.substr(0, 1);
    
    //se for um item unico ou meio a meio
    if (document.getElementById("produto" + itemNumero + 2) === null) {
        
        $.ajax({
            
            url: 'buscaPrecoProduto.php',
            data: {
                produto: $('#produto' + itemNumero + 1).val()
            },
            type: 'POST',
            
            success: function(valor) {
                
                document.getElementById('preco' + itemNumero).value = formatReal(valor);
                calculaTotal();
            },
        }); 
        
    } else {
        
        $.ajax({
            
            url: 'buscaPrecoProduto.php',
            data: {
                produto: $('#produto' + itemNumero + 1).val()
            },
            type: 'POST',
            
            success: function(valorItem1) {
                
                $.ajax({
                    
                    url: 'buscaPrecoProduto.php',
                    data: {
                        produto: $('#produto' + itemNumero + 2).val()
                    },
                    type: 'POST',
                    
                    success: function(valorItem2) {
                        
                        $.ajax({
                            
                            url: 'buscaPrecoProduto.php',
                            data: {
                                produto: $('#produto' + itemNumero + 3).val()
                            },
                            type: 'POST',
                            
                            success: function(valorItem3) {
                                
                                $.ajax({
                                    
                                    url: 'buscaPrecoProduto.php',
                                    data: {
                                        produto: $('#produto' + itemNumero + 4).val()
                                    },
                                    type: 'POST',
                                    
                                    success: function(valorItem4) {
                                        
                                        var max = Math.max(valorItem1, valorItem2, valorItem3, valorItem4);
                                        document.getElementById('preco' + itemNumero).value = formatReal(max);
                                        
                                        calculaTotal();
                                    },
                                }); 
                                
                            },
                        });
                        
                    },
                });
                
            },
        });
    }
}

function calculaTotal(){
    
    var total = 0;
    
    if (document.getElementById('taxaEntrega') === null) {
        
        total = parseFloat(0);
        
    } else {
        
        total = parseFloat(getMoney(document.getElementById('taxaEntrega').value));
    }
    
    for(item = contadorItens; item > 0; item--){
        
        if (document.getElementById('preco' + item) === null) {
            
        } else {
            
            total += parseFloat(getMoney(document.getElementById('preco'+item).value));
        }
    }
    
    $('#total').val(formatReal(total));
}

$(document).ready(function() {
    
    $('#add_field_meio').click(function(e) {
        
        if(document.getElementById('id').value == ''){
            
            swal({
                title: 'Nenhum cliente selecionado!',
                html: $('<div>')
                .addClass('some-class')
                .text('Adicione um cliente ao pedido.'),
                animation: false,
                customClass: 'animated tada'
            })
            
        } else {
            
            contadorItens++;
            
            e.preventDefault();
            //prevenir novos clicks
            
            $('#listas').append('\
            <div class="customBordered">\
                <div class="row">\
                    <div class="col-lg-3">\
                        <div class="form-group">\
                            <label>Categoria</label>\
                            <select onchange="atualizaSelectProdutos('+contadorItens+')" name="categoria'+ contadorItens +'" id="categoria'+ contadorItens +'" class="form-control categoria">\
                                <option value="0">--</option>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-lg-3">\
                        <div class="form-group">\
                            <label>Valor</label>\
                            <input readonly="readonly" name="preco'+ contadorItens +'" id="preco'+ contadorItens +'" class="form-control preco">\
                        </div>\
                    </div>\
                    <div class="col-lg-5">\
                        <div class="form-group">\
                            <label>Observações</label>\
                            <input id="observacao'+ contadorItens +'" name="observacao'+ contadorItens +'" value="Completo" maxlength="255" class="form-control">\
                        </div>\
                    </div>\
                    <div class="col-lg-1 text-center">\
                        <button title="Remover Item" type="button" id="remover_campo'+ contadorItens +'" class="btn btn-danger btn-circle remover_campo custom-margin-top"><i class="fa fa-times"></i></button>\
                    </div>\
                </div>\
                <div class=row>\
                    <div class="col-lg-3">\
                        <div class="form-group">\
                            <label>Sabor 1</label>\
                            <select onchange="atualizaPrecoProduto('+contadorItens+'1)" name="produto'+ contadorItens +'" id="produto'+ contadorItens +'1" class="form-control produto">\
                                <option value="0">--</option>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-lg-3">\
                        <div class="form-group">\
                            <label>Sabor 2</label>\
                            <select onchange="atualizaPrecoProduto('+contadorItens+'2)" name="produto'+ contadorItens +'" id="produto'+ contadorItens +'2" class="form-control produto">\
                                <option value="0">--</option>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-lg-3">\
                        <div class="form-group">\
                        <label>Sabor 3</label>\
                        <select onchange="atualizaPrecoProduto('+contadorItens+'3)" name="produto'+ contadorItens +'" id="produto'+ contadorItens +'3" class="form-control produto">\
                            <option value="0">--</option>\
                        </select>\
                        </div>\
                    </div>\
                    <div class="col-lg-3">\
                        <div class="form-group">\
                        <label>Sabor 4</label>\
                        <select onchange="atualizaPrecoProduto('+contadorItens+'4)" name="produto'+ contadorItens +'" id="produto'+ contadorItens +'4" class="form-control produto">\
                            <option value="0">--</option>\
                        </select>\
                        </div>\
                    </div>\
                </div>\
            </div>');
            
            //Coloca as categorias no select
            $.ajax({
                
                url: 'buscaCategorias.php',
                
                success: function(resposta) {
                    
                    $('#categoria' + contadorItens).html(resposta);
                },
            }); 
        }
    });
    
    $('#add_field').click(function(e) {
        
        if(document.getElementById('id').value == ''){
            
            swal({
                title: 'Nenhum cliente selecionado!',
                html: $('<div>')
                .addClass('some-class')
                .text('Adicione um cliente ao pedido.'),
                animation: false,
                customClass: 'animated tada'
            })
            
        } else {
            
            contadorItens++;
            
            e.preventDefault();
            //prevenir novos clicks
            
            $('#listas').append('\
            <div class="customBordered">\
                <div class="row">\
                    <div class="col-lg-2">\
                        <div class="form-group">\
                            <label>Categoria</label>\
                            <select onchange="atualizaSelectProdutos('+contadorItens+')" name="categoria'+ contadorItens +'" id="categoria'+ contadorItens +'" class="form-control categoria">\
                                <option value="0">--</option>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-lg-2">\
                        <div class="form-group">\
                            <label>Produto</label>\
                            <select onchange="atualizaPrecoProduto('+contadorItens+')" name="produto'+ contadorItens +'" id="produto'+ contadorItens +'1" class="form-control produto">\
                                <option value="0">--</option>\
                            </select>\
                        </div>\
                    </div>\
                    <div class="col-lg-2">\
                        <div class="form-group">\
                            <label>Valor</label>\
                            <input readonly="readonly" name="preco'+ contadorItens +'" id="preco'+ contadorItens +'" class="form-control preco">\
                        </div>\
                    </div>\
                    <div class="col-lg-5">\
                        <div class="form-group">\
                            <label>Observações</label>\
                            <input id="observacao'+ contadorItens +'" name="observacao'+ contadorItens +'" value="Completo" maxlength="255" class="form-control">\
                        </div>\
                    </div>\
                    <div class="col-lg-1 text-center">\
                        <button title="Remover Item" type="button" id="remover_campo'+ contadorItens +'" class="btn btn-danger btn-circle remover_campo custom-margin-top"><i class="fa fa-times"></i></button>\
                    </div>\
                </div>\
            </div>');
            
            //Coloca as categorias no select
            $.ajax({
                
                url: 'buscaCategorias.php',
                
                success: function(resposta) {
                    
                    $('#categoria' + contadorItens).html(resposta);
                },
            }); 
        }
    });
    
    $('#listas').on("click", ".remover_campo", function(e) {
        
        e.preventDefault();
        $(this).parent('div').parent('div').parent('div').remove();
        calculaTotal();
    });
});    