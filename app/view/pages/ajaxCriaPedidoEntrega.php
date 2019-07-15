<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoEntregaDAO.php';
    include_once '../../model/PedidoEntrega.php';
    
    $pedidoId       = $_POST['pedidoId'];
    $clienteId      = $_POST['clienteId'];
    $entregadorId   = $_POST['entregadorId'];
    $troco          = $_POST['troco'];
	$statusPedidoId = $_POST['statusPedidoId'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
	$pedidoEntrega = new PedidoEntrega(NULL, $pedidoId, $clienteId, $entregadorId, $troco, $statusPedidoId, NULL);
    
    $PDAO = new pedidoEntregaDAO($conn);
    
    $resultado = $PDAO->inserirPedidoEntrega($pedidoEntrega);
    
    echo $resultado;
    
?>