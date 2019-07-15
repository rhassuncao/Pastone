<?php
    
    include '../../controller/connectionFactory.php';
    include '../../model/DAO/bairroDAO.php';
    
    $id          = $_POST["id"];
    $nome        = $_POST["nome"];
    $taxaEntrega = $_POST["taxaEntrega"];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $CDAO = new bairroDAO($conn);
    
    $bairro = new Bairro($id, $nome, $taxaEntrega);
    
    $resultado = $CDAO->atualizarBairro($bairro);
    
    if($resultado==true){
        
        header("Location: bairros.php");
        exit;
        
    } else {
        
        echo $resultado;
    }
    
?>