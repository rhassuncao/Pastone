<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoMesaDAO.php';
    
    $mesaId  = $_POST['mesaId'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $PDAO = new pedidoMesaDAO($conn);
    
    $resultado = $PDAO->fecharMesa($mesaId);
    
    if($resultado==true){
        
        echo $resultado;
        
    } else {
        
        echo $resultado;
    }
    
?>