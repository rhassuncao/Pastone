<?php
    
    // ************************************************************
    // ******************   SISTEMA PARA DEBUG  *******************
    // ************************************************************
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);   
    
    //REQUERENDO AUTENTICAÇÃO
    require_once('../../controller/auth.php');
	
	$deny = array(3, 4);
	
	if(isset($_SESSION['SESS_ACCESS_LEVEL']) && in_array($_SESSION['SESS_ACCESS_LEVEL'], $deny)){
		
		header("location: forbidden.php");
		exit();
	}
	
    include_once '../functionsFuncionario.php';
    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="../../../public/img/favicon-16x16.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.min.css" rel="stylesheet">
    <title>Pastone - Pedidos</title>
    <?php include 'basiclinks.php' ?>
</head>
<body>
    <div id="wrapper">
        <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Relatório de Entregas</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Entregadores
                        </div>
                        <div class="panel-body">
                            <?php
                                
								if(isset($_SESSION['SESS_ACCESS_LEVEL']) && $_SESSION['SESS_ACCESS_LEVEL'] == 2) {
									
									listarEntregadoresTab($_SESSION['SESS_MEMBER_ID']);
									imprimePedidosEntregadoresTab($_SESSION['SESS_MEMBER_ID']);	
										
								} else {
									
									listarEntregadoresTab(NULL);
									imprimePedidosEntregadoresTab(NULL);	
								}
                             
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'basicscripts.php'; ?>
    <script>
        $(document).ready(function() {
            
            $(".zerar_entregas").on("click", function() {
                
                swal({
                    title: 'Tem certeza?',
                    text: "Zerar as entregas de um entregador marcará todas as sua entregas como pagas",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, zerar!',
                    cancelButtonText: 'Cancelar!'
                }).then((result) => {
                    if (result.value) {
                        
                        $.ajax({
                            
                            url: 'zerarentregas.php',
                            
                            data: {
                                entregadorId: this.id,
                            },
                            type: 'POST',
                            
                            success: function(resposta) {
                                
                                window.location = 'relatorio-entregas.php';
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