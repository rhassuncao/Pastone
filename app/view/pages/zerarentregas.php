<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoEntregaDAO.php';
    
    $entregadorId  = $_POST['entregadorId'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $PDAO      = new pedidoEntregaDAO($conn);
    $resultado = $PDAO->zerarEntregas($entregadorId);
    
    if($resultado==true){
        
        echo $resultado;
        
    } else {
        
        echo $resultado;
    }
    
?>