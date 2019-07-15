<?php
    
    // ************************************************************
    // ******************   SISTEMA PARA DEBUG  *******************
    // ************************************************************
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);   
    
    //REQUERENDO AUTENTICAÇÃO
    require_once('../../controller/auth.php');
	
	$deny = array(2, 4);
	
	if(isset($_SESSION['SESS_ACCESS_LEVEL']) && in_array($_SESSION['SESS_ACCESS_LEVEL'], $deny)){
		
		header("location: forbidden.php");
		exit();
	}
	
    include_once '../functionsPedidoBalcao.php';
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.min.css" rel="stylesheet">
    <title>Pastone - Pedido Balcão</title>
    <?php include 'basiclinks.php' ?>
</head>
<body>
    <div id="wrapper">
        <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Novo Pedido - Balcão</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <?php
                    
                    if(isset($_GET["id"])){
                        
                        $id = $_GET["id"];
                        mostrarPedidoBalcao($id);
                    
                    } else {
                        
                        echo "<div class='panel panel-default'>
                            <div class='panel-heading'>
                                Dados do Cliente
                            </div>
                            <div class='panel-body'>
                                <div class='row'>
                                    <div class='col-lg-12'>
                                        <div class='row'>
                                            <div class='col-lg-6'>
                                                <label>Situação</label>
                                                <label class='radio-inline'>
                                                    <input type='radio' name='status' id='pendente' value='1' checked>Pendente
                                                </label>
                                                <label class='radio-inline'>
                                                    <input type='radio' name='status' id='entregue' value='2'>Entregue
                                                </label>
                                            </div>
                                            <div style='text-align: right;' class='col-lg-6'>
                                                <label>Campos obrigatórios possuem (*)</label>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-lg-12'>
                                                <div class='form-group'>
                                                    <label>Nome*</label>
                                                    <input id='id' name='id' required maxlength='50' class='form-control'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                                Pedido
                            </div>
                            <div class='panel-body'>
                                <div class='row'>
                                    <div class='col-lg-12'>
                                        <div id='listas'>
                                            <!-- aqui sao inseridos os pedidos-->
                                        </div>
                                    </div>
                                </div>
                                <div class='row text-center'>
                                    <div class='col-lg-12'>
                                        <button title='Adicionar Item' id='add_field' type='button' class='btn btn-primary btn-circle btn-lg remover_campo'><i class='fa fa-plus'></i></button>
                                        <button title='Adicionar item meio a meio' id='add_field_meio' type='button' class='btn btn-primary btn-circle btn-lg remover_campo'><i class='fa fa-pie-chart'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                                Dados de pagamento
                            </div>
                            <div class='panel-body'>
                                <div class='row'>
                                    <div class='col-lg-12'>
                                        <div class='row'>
                                            <div class='col-lg-6'>
                                                <div class='form-group'>
                                                    <label>Total</label>
                                                    <input readonly='readonly' name='total' id='total' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='col-lg-6'>
                                                <div class='form-group'>
                                                    <label>Forma de pagamento</label>
                                                    <select id='forma_pagamento' class='form-control'>
                                                        <option value='1'>Dinheiro</option>
                                                        <option value='2'>Cartão Crédito</option>
                                                        <option value='3'>Cartão Débito</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='row text-center'>
                                            <div class='col-lg-12'>
                                                <button type='button' id='fechar_pedido' class='btn btn-success btn-circle btn-lg' title='Salvar e Imprimir'><i class='fa fa-save'></i></button>
                                                <a href='pedidos-balcao.php'>
                                                    <button title='Cancelar' type='button' class='btn btn-danger btn-circle btn-lg'><i class='fa fa-times'></i></button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";                    
                    }
                   
                ?>
                </div>
            </div>
        </div>
    </div>
    <?php include 'basicscripts.php'; ?>
    <script src="../../../public/js/pedido.js"></script>
    <script src="../../../public/js/money.js?v=?<?=filesize('../../../public/js/pedido.js')?>"></script>
    <script>
        $(document).ready(function() {
            
            $("#fechar_pedido").on("click", function(e) {
                
				if(document.getElementById('id').value != ''){
					
					if(contadorItens <= 0 || !pedidoTemItem()){
						
						swal({
							title: 'Nenhum item selecionado!',
							html: $('<div>')
							.addClass('some-class')
							.text('Adicione itens ao pedido.'),
							animation: false,
							customClass: 'animated tada'
						})
						
					} else {
						
						//previne double clicks
						$(this).off(e);
						
						$.ajax({
							
							url: 'ajaxCriaPedido.php',
							data: {
								recebidoPor: <?php echo $_SESSION['SESS_MEMBER_ID']; ?>,
								formaPagamentoId: document.getElementById('forma_pagamento').value,
							},
							type: 'POST',
							
							success: function(pedidoId) {
								
								var val;
								
								if (document.getElementById('entregue').checked) {
									
									val = 2;
									
								} else {
									
									val = 1;
								}
								
								//Cria o pedido balcao
								$.ajax({
									
									url: 'ajaxCriaPedidoBalcao.php',
									data: {
										pedidoId: pedidoId,
										nomeCliente: document.getElementById('id').value,
										statusPedido: val,
									},
									type: 'POST',
									async: false,
									
									success: function(pedidoBalcaoId) {
										
										insereItensPedido(pedidoId);
										imprimePedidoBalcao(pedidoBalcaoId);
									},
								});
							}
						});
					}
				} else {
					
					swal(
						'Nome em branco!',
						'Digite o nome do cliente.',
						'warning'
					)
				}
            });
            
            $("#entregar_pedido").on("click", function(e) {
                
                //previne double clicks
                $(this).off(e);
                
                var pedidoBalcaoId<?php 
                
                if(isset($_GET["id"])){
                    
                    echo " = ".$_GET["id"];
                } else {
                    echo ";";
                } ?> 
                    
                $.ajax({
                    
                    url: 'mudaStatusPedidoBalcao.php',
                    data: {
                        pedidoBalcaoId: pedidoBalcaoId,
                    },
                    type: 'POST',
                    
                    success: function(resposta) {
                        
                        $.ajax({
                            
                            url: 'setTimeEntregueBalcao.php',
                            data: {
                                pedidoBalcaoId: pedidoBalcaoId,
                            },
                            type: 'POST',
                            
                            success: function(resposta) {
                                
                                window.location = "pedidos-balcao.php";
                            },
                        });
                    },
                });
            });
            
            function imprimePedidoBalcao(pedidoBalcaoId){
                
                w = window.open('printBalcao.php?pedidoBalcaoId=' + pedidoBalcaoId);
                w.print();
                window.location = 'pedidos-balcao.php';
            }
            
            $(".imprimir_pedido").on("click", function(e) {
                
                //previne double clicks
                $(this).off(e);
                
                imprimePedidoBalcao(this.id);
            });
            
            $(".cancelar_pedido").on("click", function(e) {
                                
                swal({
                    title: 'Tem certeza?',
                    text: "Apagar o pedido apagará todos os itens do pedido!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, apagar!',
                    cancelButtonText: 'Cancelar!'
                }).then((result) => {
                    if (result.value) {
                        
                        //previne double clicks
                        $(this).off(e);
						
						var pedidoBalcaoId = this.id;
                        
                        $.ajax({
                            
                            url: 'cancelaPedidoBalcao.php',
                            data: {
                                pedidoBalcaoId: this.id,
                            },
                            type: 'POST',
                            
                            success: function(resposta) {
                                
								$.ajax({
									
									url: 'setTimeEntregueBalcao.php',
									data: {
										pedidoBalcaoId: pedidoBalcaoId,
									},
									type: 'POST',
									
									success: function(resposta) {
										
										window.location = "pedidos-balcao.php";
									},
								});
                            },
                        });
                    }
                })
            });
        });    
    </script>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.min.js"></script>
</html>