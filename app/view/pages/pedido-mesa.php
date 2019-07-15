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
	
    include_once '../functionsPedidoMesa.php';
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/mesaDAO.php';
    
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
    <title>Pastone - Pedido Mesa</title>
    <?php include 'basiclinks.php' ?>
</head>
<body>
    <div id="wrapper">
        <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Novo Pedido - Mesa</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        
                        if(isset($_GET["id"])){
                            
                            $id = $_GET["id"];
                            mostrarPedidoMesa($id);
                            
                        } else {
                            
                            echo "<div class='panel panel-default'>
                                <div class='panel-heading'>
                                    Dados da Mesa
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
                                                        <label>Mesa*</label>";
                                                        
                                                        $cf   = new connectionFactory();
                                                        $conn = $cf->getConnection();
                                                        
                                                        $MDAO = new mesaDAO($conn);
                                                        $mesa = $MDAO->buscarMesa($_GET["mesaId"]);     
                                                        
                                                        echo "<input value='".$mesa->getNome()."' id='id' name='id' required class='form-control' readonly='readonly'>
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
                                    <div class='row'>
                                        <div class='col-lg-12 text-center'>
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
                                                <div class='col-lg-12'>
                                                    <div class='form-group'>
                                                        <label>Total</label>
                                                        <input readonly='readonly' name='total' id='total' class='form-control'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-lg-12 text-center'>
                                                    <button type='button' id='fechar_pedido' class='btn btn-success btn-circle btn-lg' title='Salvar e Imprimir'><i class='fa fa-save'></i></button>
                                                    <a href='pedidos-mesa.php'>
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
    <?php include 'basicscripts.php';?>
    <script src="../../../public/js/pedido.js"></script>
    <script src="../../../public/js/money.js?v=?<?=filesize('../../../public/js/pedido.js')?>"></script>
    <script>
        $(document).ready(function() {
            
            $("#fechar_pedido").on("click", function(e) {
                
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
                            formaPagamentoId: "",
                        },
                        type: 'POST',
                        
                        success: function(pedidoId) {
                            
							var val;
							
							if (document.getElementById('entregue').checked) {
								
								val = 2;
								
							} else {
								
								val = 1;
							}
							
                            //Cria o pedido mesa
                            $.ajax({
                                
                                url: 'ajaxCriaPedidoMesa.php',
                                data: {
                                    pedidoId: pedidoId,
									statusPedido: val,
                                    mesaId: <?php echo $_GET['mesaId']; ?>,
                                },
                                type: 'POST',
								async: false,
                                
                                success: function(pedidoMesaId) {
                                    
                                    insereItensPedido(pedidoId);
                                    imprimePedidoMesa(pedidoMesaId);
                                },
                            });
                        }
                    });
                }  
            });
            
            function imprimePedidoMesa(pedidoMesaId){
                
                w = window.open('printMesa.php?pedidoMesaId=' + pedidoMesaId);
                w.print();
                window.location = 'pedidos-mesa.php';
            }
                
            $(".imprimir_pedido").on("click", function(e) {
                
                //previne double clicks
                $(this).off(e);
                
                imprimePedidoMesa(this.id);
            });
        });    
    </script>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.min.js"></script>
</html>