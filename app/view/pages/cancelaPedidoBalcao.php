<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoBalcaoDAO.php';
    
    $pedidoBalcaoId = $_POST['pedidoBalcaoId'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $PDAO = new pedidoBalcaoDAO($conn);
    
    $resultado = $PDAO->cancelarPedidoBalcao($pedidoBalcaoId);
    
    if($resultado==true){
        
        echo $resultado;
        
    } else {
        
        echo $resultado;
    }
    
?>