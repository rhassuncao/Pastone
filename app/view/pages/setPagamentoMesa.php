<?php
    
    include_once '../../model/DAO/pedidoMesaDAO.php';
    include_once '../../controller/connectionFactory.php';
    
    $mesaId           = $_POST['mesaId'];
    $formaPagamentoId = $_POST['formaPagamentoId'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $PDAO      = new pedidoMesaDAO($conn);
    $resultado = $PDAO->setFormaPagamentoMesa($mesaId, $formaPagamentoId);
    
    if($resultado==true){
        
        echo $resultado;
        
    } else {
        
        echo $resultado;
    }
    
?>