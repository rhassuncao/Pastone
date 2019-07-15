<?php
	
	// ************************************************************
	// ******************   SISTEMA PARA DEBUG  *******************
	// ************************************************************
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);   
	
	//REQUERENDO AUTENTICAÇÃO
	require_once '../../controller/auth.php';
	
	$deny = array(4);
	
	if(isset($_SESSION['SESS_ACCESS_LEVEL']) && in_array($_SESSION['SESS_ACCESS_LEVEL'], $deny)){
		
		header("location: forbidden.php");
		exit();
	}
	
	include_once '../../controller/connectionFactory.php';
	include_once '../../model/DAO/estadoDAO.php';
	include_once '../../model/DAO/configsDAO.php';
	include_once '../../model/DAO/estadoDAO.php';
	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Pastone - Rota</title>
		<?php include 'basiclinks.php' ?>
	</head>
	<body>
		<div id="wrapper">
			<?php include '../nav.php';?>
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Rota para entrega</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Google Maps
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-6">
										<div class='customBordered'>
											<label>Origem</label>
											<?php
												
												$cf   = new connectionFactory();
												$conn = $cf->getConnection();
												
												$CDAO    = new configsDAO($conn);
												$configs = $CDAO->buscarConfigs();
												
												$cf   = new connectionFactory();
												$conn = $cf->getConnection();
												
												$EDAO   = new estadoDAO($conn);
												$estado = $EDAO->buscarEstado($configs->getEstado());
												
											$enderecoOrigem = $configs->getEndereco().", ".$configs->getNumero().", ".$configs->getBairro()." - ".$configs->getCidade()."/".$estado->getNome()." - Brasil";
												
												echo "<p>Endereço: ".$enderecoOrigem."</p>";
											?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="customBordered">
											<label>Destino</label>
											<?php
												
												$enderecoDestino = $_GET['endereco'];
												
												echo "<p>Endereço: ".$enderecoDestino."</p>";
												
											?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 loader-div">
										<iframe
												width="100%"
												height="450"
												frameborder="0" style="border:0"
												src="https://www.google.com/maps/embed/v1/directions?
													key=AIzaSyAT3XGcR9bqqqnxps45-AI5hf3su1mjYjA
													 &origin=<?php echo $enderecoOrigem; ?>
													&destination=<?php echo $enderecoDestino; ?>"
												allowfullscreen>
										</iframe>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'basicscripts.php'; ?>
	</body>
</html>