<?php 
	
	// ************************************************************
	// ******************   SISTEMA PARA DEBUG  *******************
	// ************************************************************
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);   
	
	//REQUERENDO AUTENTICAÇÃO
	require_once '../../controller/auth.php';
	
	$deny = array();
	
	if(isset($_SESSION['SESS_ACCESS_LEVEL']) && in_array($_SESSION['SESS_ACCESS_LEVEL'], $deny)){
		
		header("location: forbidden.php");
		exit();
	}
	
	include_once '../../controller/connectionFactory.php';
	include_once '../../model/DAO/configsDAO.php';
	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pastone - Nível de acesso insuficientes</title>
		<?php include 'basiclinks.php' ?>
		<link href="../../../public/css/styleLogin.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
	</head>
	
	<body>
		<div class="body"></div>
		<div class="grad"></div>
		<div class='expire'>
			<div>Sua licença expirará em <?php echo $_GET['days'];?> dias</div>
			<div>Contate o administrador do sistema para renovar sua licença</div>
			<div><a href='http://www.linksantos.com/contato.php'>Link Santos</a></div>
			<a href='index.php'>
				<button title='Voltar' alt='Voltar' type='button' class='btn btn-primary btn-circle btn-lg'><i class='fa fa-arrow-right'></i></button>
			</a>
		</div>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	</body>
</html>