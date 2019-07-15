<?php
    
    include '../../controller/connectionFactory.php';
    include '../../model/DAO/configsDAO.php';
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $CDAO = new configsDAO($conn);
    
    $resultado = $CDAO->restaurarConfiguracoes();
    
    if($resultado==true){
        
        echo "Sistema restaurado";
        
    } else {
        
        echo resultado;
    }
    
?>