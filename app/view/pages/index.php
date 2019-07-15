<?php
    
    // ************************************************************
    // ******************   SISTEMA PARA DEBUG  *******************
    // ************************************************************
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);   
    
    //REQUERENDO AUTENTICAÇÃO
    require_once('../../controller/auth.php');
	
	$deny = array();
	
	if(isset($_SESSION['SESS_ACCESS_LEVEL']) && in_array($_SESSION['SESS_ACCESS_LEVEL'], $deny)){
		
		header("location: forbidden.php");
		exit();
	}
	
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoEntregaDAO.php';
    include_once '../../model/DAO/pedidoBalcaoDAO.php';
    include_once '../../model/DAO/pedidoMesaDAO.php';
    include_once '../../model/DAO/pedidoDAO.php';
	include_once '../../model/DAO/scriptDAO.php';
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pastone - Início</title>
    <?php include 'basiclinks.php' ?>
</head>
<body>
    <div id="wrapper">
        <?php include '../nav.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Início</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pedidos Realizados
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class='col-lg-12'>
									<p class='customBordered'>Valores que levam em consideração os pedidos entregues, cancelados e pendentes que ainda não foram lançados*</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class='col-lg-3'>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-truck fa-4x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <?php
                                                        
                                                        $cf   = new connectionFactory();
                                                        $conn = $cf->getConnection();
                                                        
                                                        $EDAO  = new pedidoEntregaDAO($conn);
                                                        $stats = $EDAO->contarNaoLancadoEntrega();
                                                        
                                                        echo "<div class='huge'>".$stats."</div>";
                                                        
                                                    ?>
                                                    <div>Entrega</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="pedidos-entrega.php">
                                            <div class="panel-footer">
                                                <span class="pull-left">Ver pedidos</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class='col-lg-3'>
                                    <div class="panel panel-green">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-table fa-4x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <?php
                                                    
                                                        $cf   = new connectionFactory();
                                                        $conn = $cf->getConnection();
                                                        
                                                        $EDAO2  = new pedidoMesaDAO($conn);
                                                        $stats2 = $EDAO2->contarNaoLancadoMesa();
                                                        
                                                        echo "<div class='huge'>".$stats2."</div>";
                                                    
                                                    ?>
                                                    <div>Mesas</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="pedidos-mesa.php">
                                            <div class="panel-footer">
                                                <span class="pull-left">Ver Pedidos</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class='col-lg-3'>
                                    <div class="panel panel-red">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-square fa-4x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <?php
                                                        
                                                        $cf   = new connectionFactory();
                                                        $conn = $cf->getConnection();
                                                        
                                                        $EDAO3  = new pedidoBalcaoDAO($conn);
                                                        $stats3 = $EDAO3->contarNaoLancadoBalcao();
                                                        
                                                        echo "<div class='huge'>".$stats3."</div>";
                                                        
                                                    ?>
                                                    <div>Balcão</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="pedidos-balcao.php">
                                            <div class="panel-footer">
                                                <span class="pull-left">Ver Pedidos</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class='col-lg-3'>
                                    <div class="panel panel-yellow">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-shopping-cart fa-4x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <?php
                                                        
                                                        $cf   = new connectionFactory();
                                                        $conn = $cf->getConnection();
                                                        
                                                        $EDAO4  = new pedidoDAO($conn);
                                                        $stats4 = $EDAO4->contarNaoLancado();
                                                        
                                                        echo "<div class='huge'>".$stats4."</div>";
                                                        
                                                    ?>
                                                    <div>Total</div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="relatorio-vendas.php">
                                            <div class="panel-footer">
                                                <span class="pull-left">Vendas</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Script
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class='col-lg-12'>
                                    <p class='customBordered'>Este script foi criado para facilitar a interação do atendente com o cliente. Utilize o botão verde "Copiar" para copiar o texto do campo ao lado do botão</p>
                                </div>
                            </div>
							
							<?php
							
							$cf   = new connectionFactory();
							$conn = $cf->getConnection();
							
							$SDAO   = new scriptDAO($conn);
							$script = $SDAO->buscarScript();

							
							echo "<form role='form' method='post' action='alteraScript.php'>
								<div class='row'>
									<div class='col-lg-2'>
										<button type='button' id='01' class='copy_button btn btn-success btn-block'>Copiar</button>
									</div>
									<div class='col-lg-10'>
										<input value='".$script->getScript01()."'maxlength='255' class='form-control' name='script01' id='field01'>
									</div>
								</div>
								<div class='row' style='margin-top: 10px;'>
									<div class='col-lg-2'>
										<button type='button' id='02' class='copy_button btn btn-success btn-block'>Copiar</button>
									</div>
									<div class='col-lg-10'>
										<input value='".$script->getScript02()."'maxlength='255' class='form-control' name='script02' id='field02'>
									</div>
								</div>
								<div class='row' style='margin-top: 10px;'>
									<div class='col-lg-2'>
										<button type='button' id='03' class='copy_button btn btn-success btn-block'>Copiar</button>
									</div>
									<div class='col-lg-10'>
										<input value='".$script->getScript03()."'maxlength='255' class='form-control' name='script03' id='field03'>
									</div>
								</div>
								<div class='row' style='margin-top: 10px;'>
									<div class='col-lg-2'>
										<button type='button' id='04' class='copy_button btn btn-success btn-block'>Copiar</button>
									</div>
									<div class='col-lg-10'>
										<input value='".$script->getScript04()."'maxlength='255' class='form-control' name='script04' id='field04'>
									</div>
								</div>
								<div class='row' style='margin-top: 10px;'>
									<div class='col-lg-2'>
										<button type='button' id='05' class='copy_button btn btn-success btn-block'>Copiar</button>
									</div>
									<div class='col-lg-10'>
										<input value='".$script->getScript05()."'maxlength='255' class='form-control' name='script05' id='field05'>
									</div>
								</div>
								<div class='row' style='margin-top: 10px;'>
									<div class='col-lg-2'>
										<button type='button' id='06' class='copy_button btn btn-success btn-block'>Copiar</button>
									</div>
									<div class='col-lg-10'>
										<input value='".$script->getScript06()."'maxlength='255' class='form-control' name='script06' id='field06'>
									</div>
								</div>
								<div class='row' style='margin-top: 10px;'>
									<div class='col-lg-2'>
										<button type='button' id='07' class='copy_button btn btn-success btn-block'>Copiar</button>
									</div>
									<div class='col-lg-10'>
										<input value='".$script->getScript07()."'maxlength='255' class='form-control' name='script07' id='field07'>
									</div>
								</div>
								<div class='row' style='margin-top: 10px;'>
									<div class='col-lg-2'>
										<button type='button' id='08' class='copy_button btn btn-success btn-block'>Copiar</button>
									</div>
									<div class='col-lg-10'>
										<input value='".$script->getScript08()."'maxlength='255' class='form-control' name='script08' id='field08'>
									</div>
								</div>
								<div class='row' style='margin-top: 10px;'>
									<div class='col-lg-2'>
										<button type='button' id='09' class='copy_button btn btn-success btn-block'>Copiar</button>
									</div>
									<div class='col-lg-10'>
										<input value='".$script->getScript09()."'maxlength='255' class='form-control' name='script09' id='field09'>
									</div>
								</div>
								<div class='row' style='margin-top: 10px;'>
									<div class='col-lg-2'>
										<button type='button' id='10' class='copy_button btn btn-success btn-block'>Copiar</button>
									</div>
									<div class='col-lg-10'>
										<input value='".$script->getScript10()."'maxlength='255' class='form-control' name='script10' id='field10'>
									</div>
								</div>
								<div class='row text-center' style='margin-top: 10px;'>
                                    <div class='col-lg-12'>
                                        <button title='Salvar' type='submit' class='btn btn-success btn-circle btn-lg'><i class='fa fa-save'></i></button>
                                    </div>
                                </div>
							</form>";
							?>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'basicscripts.php'; ?>
    <script>
        
        $(".copy_button").on("click", function(e) {
            
            var copyText = document.getElementById('field' + this.id);
            copyText.select();
            document.execCommand("Copy");
        });
    </script>
</body>
</html>