<?php
    
    // ************************************************************
    // ******************   SISTEMA PARA DEBUG  *******************
    // ************************************************************
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);   
    
    //REQUERENDO AUTENTICAÇÃO
    require_once('../../controller/auth.php');
	
	$deny = array(2, 3, 4);
	
	if(isset($_SESSION['SESS_ACCESS_LEVEL']) && in_array($_SESSION['SESS_ACCESS_LEVEL'], $deny)){
		
		header("location: forbidden.php");
		exit();
	}
	
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoEntregaDAO.php';
    include_once '../functionsTratamentoString.php';
    include_once '../../model/DAO/pedidoMesaDAO.php';
    include_once '../../model/DAO/pedidoBalcaoDAO.php';
    include_once '../../model/DAO/pedidoDAO.php';
    include_once '../../model/DAO/configsDAO.php';
    
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
        <title>Pastone - Relatório Vendas</title>
        <?php include 'basiclinks.php' ?>
        <!-- Morris Charts CSS -->
        <link href="../../../public/css/morris.css" rel="stylesheet">
        <!-- DataTables CSS -->
        <link href="../../../public/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="../../../public/css/dataTables/dataTables.responsive.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <?php include '../nav.php';?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            
                            $cf   = new connectionFactory();
                            $conn = $cf->getConnection();
                            
                            $confDAO = new configsDAO($conn);
                            $configs = $confDAO->buscarConfigs();
                            
						echo "<div style='position: absolute; left: 727px; top: -5px;' class='visible-print text-right tipografia-pastone'>Pastone <span>WEB</span></div>";
                            echo "<h1 class='page-header'>Relatório de Vendas ".$configs->getNomeCliente()."</h1>";
                            
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Produtos Vendidos
                            </div>
                            <div class="panel-body">
								<div class='row'>
									<?php
											
										$cf   = new connectionFactory();
										$conn = $cf->getConnection();
											
										$PPDAO      = new pedidoDAO($conn);
										$maisAntigo = $PPDAO->buscarNaoLancadoMaisAntigo();
											
										if($maisAntigo == ''){
												
											$maisAntigo = "-";
												
										} else {
												
											$maisAntigo = substr($maisAntigo, 8, 2) . "/" . substr($maisAntigo,5,2) . "/" . substr($maisAntigo, 0, 4) . " - " . substr($maisAntigo, 11,8);

										}
											
										date_default_timezone_set('America/Sao_Paulo');
										$atual = date('d/m/Y - H:i:s', time());
											
										echo "<div class='col-lg-6'>
											<p>Período de Apuração: ".$maisAntigo." à ".$atual."</p>
										</div>
										";
											
									?>
									
								</div>
                                <div class="dataTable_wrapper">
                                    <p><b>*Valores sem as taxas de entrega</b></p>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Tipo de Venda</th>
                                                <th>Em dinheiro</th>
                                                <th>Cartão de crédito</th>
                                                <th>Cartão de débito</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <?php
                                                    
                                                    $cf   = new connectionFactory();
                                                    $conn = $cf->getConnection();
                                                    
                                                    $BDAO          = new pedidoEntregaDAO($conn);
                                                    $totaisEntrega = $BDAO->buscarNaoLancadoEntrega();
                                                    
                                                    $dinheiroEntrega = isset($totaisEntrega[1])?$totaisEntrega[1]:0;
                                                    $creditoEntrega  = isset($totaisEntrega[2])?$totaisEntrega[2]:0;
                                                    $debitoEntrega   = isset($totaisEntrega[3])?$totaisEntrega[3]:0;
                                                    
                                                    echo "<td><a href='pedidos-entrega.php'>Entrega</a></td>
                                                    <td>R$ ".valorMoedaVirgula($dinheiroEntrega)."</td>
                                                    <td>R$ ".valorMoedaVirgula($creditoEntrega)."</td>
                                                    <td>R$ ".valorMoedaVirgula($debitoEntrega)."</td>
                                                    <td>R$ ".valorMoedaVirgula($dinheiroEntrega + $creditoEntrega + $debitoEntrega)."</td>"
                                                    ;
                                                ?>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <?php
                                                    
                                                    $cf   = new connectionFactory();
                                                    $conn = $cf->getConnection();
                                                    
                                                    $MDAO       = new pedidoMesaDAO($conn);
                                                    $totaisMesa = $MDAO->buscarNaoLancadoMesa();
                                                    
                                                    $dinheiroMesa = isset($totaisMesa[1])?$totaisMesa[1]:0;
                                                    $creditoMesa  = isset($totaisMesa[2])?$totaisMesa[2]:0;
                                                    $debitoMesa   = isset($totaisMesa[3])?$totaisMesa[3]:0;
                                                    
                                                    echo "<td><a href='pedidos-mesa.php'>Mesa</a></td>
                                                        <td>R$ ".valorMoedaVirgula($dinheiroMesa)."</td>
                                                        <td>R$ ".valorMoedaVirgula($creditoMesa)."</td>
                                                        <td>R$ ".valorMoedaVirgula($debitoMesa)."</td>
                                                        <td>R$ ".valorMoedaVirgula($dinheiroMesa + $creditoMesa + $debitoMesa)."</td>";
                                                    
                                                ?>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <?php
                                                    
                                                    $cf   = new connectionFactory();
                                                    $conn = $cf->getConnection();
                                                    
                                                    $BDAO         = new pedidoBalcaoDAO($conn);
                                                    $totaisBalcao = $BDAO->buscarNaoLancadoBalcao();
                                                    
                                                    $dinheiroBalcao = isset($totaisBalcao[1])?$totaisBalcao[1]:0;
                                                    $creditoBalcao  = isset($totaisBalcao[2])?$totaisBalcao[2]:0;
                                                    $debitoBalcao   = isset($totaisBalcao[3])?$totaisBalcao[3]:0;
                                                    
                                                    echo "<td><a href='pedidos-balcao.php'>Balcão</a></td>
                                                        <td>R$ ".valorMoedaVirgula($dinheiroBalcao)."</td>
                                                        <td>R$ ".valorMoedaVirgula($creditoBalcao)."</td>
                                                        <td>R$ ".valorMoedaVirgula($debitoBalcao)."</td>
                                                        <td>R$ ".valorMoedaVirgula($dinheiroBalcao + $creditoBalcao + $debitoBalcao)."</td>"
                                                        ;
                                                ?>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <?php
                                                
                                                    echo "<td>Geral</td>
                                                        <td>R$ ".valorMoedaVirgula($dinheiroBalcao + $dinheiroMesa + $dinheiroEntrega)."</td>
                                                        <td>R$ ".valorMoedaVirgula($creditoBalcao + $creditoMesa + $creditoEntrega)."</td>
                                                        <td>R$ ".valorMoedaVirgula($debitoBalcao + $debitoMesa + $debitoEntrega)."</td>
                                                        <td>R$ ".valorMoedaVirgula(
                                                            $dinheiroBalcao + $dinheiroEntrega + $dinheiroMesa + $creditoBalcao + $creditoMesa + $creditoEntrega + $debitoBalcao + $debitoMesa + $debitoEntrega)."</td>";
                                                        
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                         <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <i class="fa fa-bar-chart-o fa-fw"></i>Demonstrativo tipo de pagamento
                                            </div>
                                            <div class="panel-body">
                                                <div id="morris-donut-chart1"></div>
                                                <a href="#" class="btn btn-default btn-block hidden-print">Detalhes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <i class="fa fa-bar-chart-o fa-fw"></i>Demonstrativo tipo de venda
                                            </div>
                                            <div class="panel-body">
                                                <div id="morris-donut-chart2"></div>
                                                <a href="#" class="btn btn-default btn-block hidden-print">Detalhes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row text-center'>
                                    <div class='col-lg-12'>
                                        <a href='index.php' class='hidden-print nounderline'>
                                            <button title='Voltar' alt='Voltar' type='button' class='btn btn-primary btn-circle btn-lg'><i class='hidden-print fa fa-arrow-left'></i></button>
                                        </a>
										<?php
											
											$cf   = new connectionFactory();
											$conn = $cf->getConnection();
											
											$CDAO           = new pedidoEntregaDAO($conn);
											$pedidosEntrega = $CDAO->listarPedidosEntregaPendente();
											
											$cf   = new connectionFactory();
											$conn = $cf->getConnection();
											
											$CDAO           = new pedidoBalcaoDAO($conn);
											$pedidosBalcao = $CDAO->listarPedidosBalcaoPendente();
											
											$cf   = new connectionFactory();
											$conn = $cf->getConnection();
											
											$CDAO           = new pedidoMesaDAO($conn);
											$pedidosMesa = $CDAO->listarPedidosMesaPendente();
											
											if(count($pedidosEntrega)>0){
												
												echo "<button title='Lançar Vendas' type='button' id='entrega' class='hidden-print btn btn-success btn-circle btn-lg pendencias'><i class='fa fa-check'></i></button>";
												
											} elseif(count($pedidosBalcao)>0){
												
												echo "<button title='Lançar Vendas' type='button' id='balcao' class='hidden-print btn btn-success btn-circle btn-lg pendencias'><i class='fa fa-check'></i></button>";
												
											} elseif(count($pedidosMesa)>0){
												
												echo "<button title='Lançar Vendas' type='button' id='mesa' class='hidden-print btn btn-success btn-circle btn-lg  pendencias'><i class='fa fa-check'></i></button>";
												
											} else{
												
												echo "<button title='Lançar Vendas' type='button' id='lancamento' class='hidden-print btn btn-success btn-circle btn-lg'><i class='fa fa-check'></i></button>";
											}
										?>
                                        <button title='Imprimir A4' type='button' id='imprimir_fechamento' class='hidden-print btn btn-primary btn-circle btn-lg'><i class='fa fa-print'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'basicscripts.php'; ?>
        <!-- Morris Charts JavaScript -->
        <script src="../../../public/js/raphael.min.js"></script>
        <script src="../../../public/js/morris.min.js"></script>
        <script>
            $(document).ready(function() {
                
                 Morris.Donut({
                     
                    element: 'morris-donut-chart1',
                    //resize: true,
                    data: [{
                        label: "Dinheiro",
                        value: <?php echo $dinheiroMesa + $dinheiroBalcao + $dinheiroEntrega; ?>
                    }, {
                        label: "Cartão de crédito",
                        value: <?php echo $creditoMesa + $creditoBalcao + $creditoEntrega; ?>
                    }, {
                        label: "Cartão de débito",
                        value: <?php echo $debitoMesa + $debitoBalcao + $debitoEntrega; ?>
                    }],
                    
                });
                
                Morris.Donut({
                    
                    element: 'morris-donut-chart2',
                    data: [{
                        label: "Entrega",
                        value: <?php echo $dinheiroEntrega + $debitoEntrega + $creditoEntrega; ?>
                    }, {
                        label: "Mesa",
                        value: <?php echo $dinheiroMesa + $debitoMesa + $creditoMesa; ?>
                    }, {
                        label: "Balcão",
                        value: <?php echo $dinheiroBalcao + $debitoBalcao + $creditoBalcao; ?>
                    }],
                    resize: true
                });
				
				$(".pendencias").on("click", function(e) {
					
					//previne double clicks
					$(this).off(e);
					
					swal({
						title: 'Pedidos Pendentes',
						text: "Não é possível lanças as vendas pois existem pedidos " + this.id + "  pendentes",
						type: 'warning',
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Ver pedidos ' + this.id,
					}).then((result) => {
						
						window.location = 'pedidos-' + this.id + '.php';
					})
				});
                
                $("#lancamento").on("click", function(e) {
                   
                    swal({
                        title: 'Tem certeza?',
                        text: "O lançamento zera todos os valores dos relatórios de vendas",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim, lançar!',
                        cancelButtonText: 'Cancelar!'
                    }).then((result) => {
                        if (result.value) {
							
							//previne double clicks
							$(this).off(e);
                            
                            $.ajax({
                                
                                url: 'lancamento.php',
                                
                                type: 'POST',
                                
                                success: function(resposta) {
                                    
                                    window.location = 'index.php';
                                },
                            });
                        }
                    })
                });
                
                $("#imprimir_fechamento").on("click", function(e) {
                    
                    window.print();
                });
            });
        </script>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.min.js"></script>
</html>