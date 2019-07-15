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
	
    include_once '../functionsMesa.php';
    
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
    <title>Pastone - Pedidos Mesa</title>
    <?php include 'basiclinks.php' ?>
    <!-- DataTables CSS -->
    <link href="../../../public/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../../../public/css/dataTables/dataTables.responsive.css" rel="stylesheet">
    <style>
        .customSwalBtn{
            background-color: rgba(214,130,47,1.00);
            border-left-color: rgba(214,130,47,1.00);
            border-right-color: rgba(214,130,47,1.00);
            border: 0;
            border-radius: 3px;
            box-shadow: none;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            font-weight: 500;
            margin: 30px 5px 0px 5px;
            padding: 10px 32px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ver pedidos Mesa</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pedidos Mesa
                        </div>
                        <div class="panel-body">
                            <?php
                                
                                listarMesasTab();
                                imprimePedidosMesasTab();
                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'basicscripts.php'; ?>
    <?php include 'tablescripts.php';?>
    <script>
        $(document).ready(function() {
            
            $(".imprimir_mesa").on("click", function() {
                
                w = window.open('printFechamentoMesa.php?pedidoMesaId=' + this.id);
                w.print();
                window.location = 'pedidos-mesa.php';
            });
            
            $(".fechar_mesa").on("click", function() {
                   
                swal({
                    title: 'Tem certeza?',
                    text: "Zerar a mesa apagará todos os pedidos!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, zerar!',
                    cancelButtonText: 'Cancelar!'
                }).then((result) => {
                    if (result.value) {
                        
                        swal({
                            title: 'Pagamento',
                            html: "Selecione a forma de pagamento" +
                            "<br>" +
                            "<button type='button' class='SwalBtn1 customSwalBtn' id='"+ this.id+ "'>Dinheiro</button>"
                            +
                            "<button type='button' class='SwalBtn2 customSwalBtn' id='"+ this.id+ "'>Cartão de Crédito </button>"
                            +
                            "<button type='button' class='SwalBtn3 customSwalBtn' id='"+ this.id+ "'>Cartão de Débito</button>"
                            + "<br>",
                            showCancelButton: true,
                            cancelButtonColor: '#d33',
                            showConfirmButton: false
                        }); 
                    }
                })
            });
            
            $(".cancelar_pedido").on("click", function() {
                
                swal({
                    title: 'Tem certeza?',
                    text: "Cancelar o pedido cancelará todos os itens do pedido!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, cancelar!',
                    cancelButtonText: 'Cancelar!'
                }).then((result) => {
					
                    if (result.value) {
                        
						var pedidoMesaId = this.id;
						
                        $.ajax({
                            
                            url: 'cancelaPedidoMesa.php',
                            data: {
                                pedidoMesaId: this.id,
                            },
                            type: 'POST',
                            
                            success: function(resposta) {
                                
								$.ajax({
									
									url: 'setTimeEntregueMesa.php',
									data: {
										pedidoMesaId: pedidoMesaId,
									},
									type: 'POST',
									
									success: function(resposta) {
										
										window.location = 'pedidos-mesa.php';
									},
								});  
                            },
                        });
                    }
                })
            });
            
            $(".entregar_pedido").on("click", function(e) {
                
                swal({
                    title: 'Tem certeza?',
                    text: "tem certeza que deseja marcar este pedido como entregue agora?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, entregar!',
                    cancelButtonText: 'Cancelar!'
                }).then((result) => {
                    if (result.value) {
                        
                        $.ajax({
                            
                            url: 'mudaStatusPedidoMesa.php',
                            
                            data: {
                                pedidoMesaId: this.id,
                            },
                            type: 'POST',
                            
                            success: function(resposta) {
                                
                                $.ajax({
                                    
                                    url: 'setTimeEntregueMesa.php',
                                    data: {
                                        pedidoMesaId: this.id,
                                    },
                                    type: 'POST',
                                    
                                    success: function(resposta) {
                                        
                                        window.location = 'pedidos-mesa.php';
                                    },
                                });  
                            },
                        });
                    }
                })
            });
        });
        
        //TODO resumir estas 3 funcoes em uma so
        $(document).on('click', '.SwalBtn1', function() {
            
            var mesinha = this.id;
            
            $.ajax({
                
                url: 'setPagamentoMesa.php',
                
                data: {
                    mesaId: mesinha,
                    formaPagamentoId: 1,
                },
                type: 'POST',
                async: false,
                
                success: function(resposta) {
                    
                    
                },
            });
            
            $.ajax({
                
                url: 'fechaMesa.php',
                
                data: {
                    mesaId: mesinha,
                },
                type: 'POST',
                async: false,
                
                success: function(resposta) {
                    
                    window.location = 'pedidos-mesa.php';
                },
            });
        });
        
        $(document).on('click', '.SwalBtn2', function() {
            
            var mesinha = this.id;
            
            $.ajax({
                
                url: 'setPagamentoMesa.php',
                
                data: {
                    mesaId: mesinha,
                    formaPagamentoId: 2,
                },
                type: 'POST',
                async: false,
                
                success: function(resposta) {
                    
                    
                },
            });
            
            $.ajax({
                
                url: 'fechaMesa.php',
                
                data: {
                    mesaId: mesinha,
                },
                type: 'POST',
                async: false,
                
                success: function(resposta) {
                    
                    window.location = 'pedidos-mesa.php';
                },
            });
        });
        
        $(document).on('click', '.SwalBtn3', function() {
            
            var mesinha = this.id;
            
            $.ajax({
                
                url: 'setPagamentoMesa.php',
                
                data: {
                    mesaId: mesinha,
                    formaPagamentoId: 3,
                },
                type: 'POST',
                async: false,
                
                success: function(resposta) {
                    
                    
                },
            });
            
            $.ajax({
                
                url: 'fechaMesa.php',
                
                data: {
                    mesaId: mesinha,
                },
                type: 'POST',
                async: false,
                
                success: function(resposta) {
                    
                    window.location = 'pedidos-mesa.php';
                },
            });
        });
        
        
    </script>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.min.js"></script>
</html>