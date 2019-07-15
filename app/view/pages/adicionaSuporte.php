<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/suporteDAO.php';
    
    $descricao     = $_POST["descricao"];
    $funcionarioId = $_POST["funcionarioId"];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $SDAO      = new suporteDAO($conn);
    $suporte   = new Suporte(NULL, $descricao, NULL, $funcionarioId, NULL, NULL);  
    $resultado = $SDAO->inserirSuporte($suporte);
    
    if($resultado == true){
        
        header("Location: suporte.php");
        exit;
        
    } else {
        
        echo $resultado;
    }
    
?>