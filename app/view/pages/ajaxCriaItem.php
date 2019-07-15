<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/itemDAO.php';
    include_once '../../model/Item.php';
    
    $produtoId  = $_POST['produtoId'];
    $pedidoId   = $_POST['pedidoId'];
    $observacao = $_POST['observacao'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $item = new Item(NULL, $produtoId, $pedidoId, $observacao);
    
    $IDAO = new itemDAO($conn);
    $resultado = $IDAO->inserirItem($item);
    
    if($resultado==true){
        
        echo "Item inserido com sucesso";
        
    } else {
        
        echo resultado;
    }
    
?>