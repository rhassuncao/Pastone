<?php
    
    include '../../controller/connectionFactory.php';
    include '../../model/DAO/configsDAO.php';
    
    $nomeCliente      = $_POST["nomeCliente"];
    $site             = $_POST["site"];
    $facebook         = $_POST["facebook"];
	$viasBalcao       = $_POST["viasBalcao"];
	$viasEntrega      = $_POST["viasEntrega"];
	$viasMesa         = $_POST["viasMesa"];
	$viasMesaSingle   = $_POST["viasMesaSingle"];
	$noveLinhasDepois = $_POST["noveLinhasDepois"];
	$numeroColunas    = $_POST["numeroColunas"];
	$endereco         = $_POST["endereco"];
	$numero           = $_POST["numero"];
	$bairro           = $_POST["bairro"];
	$cidade           = $_POST["cidade"];
	$estado           = $_POST["estado"];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $CDAO = new configsDAO($conn);
    
	$configs = new Configs(NULL, $nomeCliente, $facebook, $site, $viasBalcao, $viasEntrega, $viasMesa, $viasMesaSingle, $noveLinhasDepois, $numeroColunas, NULL, NULL, $endereco, $numero, $bairro, $cidade, $estado);
    
    $resultado = $CDAO->atualizarConfigs($configs);
    
    if($resultado==true){
        
        header("Location: index.php");
        exit;
        
    } else {
        
        echo $resultado;
    }
    
?>