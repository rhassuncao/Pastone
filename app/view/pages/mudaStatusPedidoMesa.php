<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoMesaDAO.php';
    
    $pedidoMesaId = $_POST['pedidoMesaId'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $PDAO = new pedidoMesaDAO($conn);
    
    $resultado = $PDAO->mudarStatusPedidoMesa($pedidoMesaId);
    
    if($resultado==true){
        
        echo $resultado;
        
    } else {
        
        echo $resultado;
    }
    
?>