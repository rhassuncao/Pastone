<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoEntregaDAO.php';
    
    $pedidoEntregaId = $_POST['pedidoEntregaId'];
    $entregadorId    = $_POST['entregadorId'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $PDAO = new pedidoEntregaDAO($conn);
    
    $resultado = $PDAO->mudarEntregadorPedidoEntrega($entregadorId, $pedidoEntregaId);
    
    if($resultado==true){
        
        echo $resultado;
        
    } else {
        
        echo $resultado;
    }
    
?>