<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoDAO.php';
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $PDAO = new pedidoDAO($conn);
    $PDAO->lancarPedidos();
    
?>