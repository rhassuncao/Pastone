<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/mesaDAO.php';
    
    $nome      = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $ativo     = $_POST["ativo"];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $CDAO = new mesaDAO($conn);
    
    $mesa = new Mesa(NULL, $nome, $descricao, $ativo);
    
    $resultado = $CDAO->inserirMesa($mesa);
    
    if($resultado==true){
        
        header("Location: mesas.php");
        exit;
        
    } else {
        
        echo $resultado;
    }
    
?>