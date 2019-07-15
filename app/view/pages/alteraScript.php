<?php

include '../../controller/connectionFactory.php';
include '../../model/DAO/scriptDAO.php';

$script01 = $_POST["script01"];
$script02 = $_POST["script02"];
$script03 = $_POST["script03"];
$script04 = $_POST["script04"];
$script05 = $_POST["script05"];
$script06 = $_POST["script06"];
$script07 = $_POST["script07"];
$script08 = $_POST["script08"];
$script09 = $_POST["script09"];
$script10 = $_POST["script10"];

$cf   = new connectionFactory();
$conn = $cf->getConnection();

$SDAO = new scriptDAO($conn);

$script = new Script(NULL, $script01, $script02, $script03, $script04,
					 $script05, $script06, $script07, $script08,
					 $script09, $script10);

$resultado = $SDAO->atualizarScript($script);

if($resultado==true){

	header("Location: index.php");
	exit;

} else {

	echo $resultado;
}

?>