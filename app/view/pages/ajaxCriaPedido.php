<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoDAO.php';
    include_once '../../model/Pedido.php';
    
    $recebidoPor = $_POST['recebidoPor'];
    $formaPagamentoId = $_POST['formaPagamentoId'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $pedido = new Pedido(NULL, $recebidoPor, $formaPagamentoId, NULL, NULL, NULL);
    
    $PDAO = new pedidoDAO($conn);
    $pedidoId = $PDAO->inserirPedido($pedido);
    
    echo $pedidoId;
    
?>