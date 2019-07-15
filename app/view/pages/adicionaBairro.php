<?php
    
    include '../../controller/connectionFactory.php';
    include '../../model/DAO/bairroDAO.php';
    
    $nome        = $_POST["nome"];
    $taxaEntrega = $_POST["taxaEntrega"];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $CDAO = new bairroDAO($conn);
    
    $bairro = new Bairro(NULL, $nome, $taxaEntrega);
    
    $resultado = $CDAO->inserirBairro($bairro);
    
    if($resultado==true){
        
        header("Location: bairros.php");
        exit;
        
    } else {
        
        echo $resultado;
    }
    
?>