<?php
    
    include_once '../../controller/connectionFactory.php';    
    include_once '../../model/DAO/pedidoBalcaoDAO.php';
    include_once '../../model/PedidoBalcao.php';
    
    $pedidoId     = $_POST['pedidoId'];
    $nomeCliente  = $_POST['nomeCliente'];
    $statusPedido = $_POST['statusPedido'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $pedidoBalcao = new PedidoBalcao(NULL, $pedidoId, $nomeCliente, $statusPedido);
    
    $PDAO = new pedidoBalcaoDAO($conn);
    
    $resultado = $PDAO->inserirPedidoBalcao($pedidoBalcao);
    
    echo $resultado;
    
?>