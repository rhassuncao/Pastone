<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoEntregaDAO.php';
    
    $pedidoEntregaId = $_POST['pedidoEntregaId'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $PDAO = new pedidoEntregaDAO($conn);
    
    $resultado = $PDAO->cancelarPedidoEntrega($pedidoEntregaId);
    
    if($resultado==true){
        
        echo $resultado;
        
    } else {
        
        echo $resultado;
    }
    
?>