<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoMesaDAO.php';
    include_once '../../model/PedidoMesa.php';
    
    $pedidoId     = $_POST['pedidoId'];
    $mesaId       = $_POST['mesaId'];
	$statusPedido = $_POST['statusPedido'];
    
    $cf = new connectionFactory();
    $conn = $cf->getConnection();
    
	$pedidoMesa = new PedidoMesa(NULL, $pedidoId, $mesaId, $statusPedido);
    
    $PDAO = new pedidoMesaDAO($conn);
    
    $resultado = $PDAO->inserirPedidoMesa($pedidoMesa);
    
    echo $resultado;
    
?>