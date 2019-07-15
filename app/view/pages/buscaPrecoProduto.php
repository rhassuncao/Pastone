<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/produtoDAO.php';
    include_once '../../model/Produto.php';
    
    $produtoId = $_POST['produto'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $PDAO    = new produtoDAO($conn);
    $produto = $PDAO->buscarProduto($produtoId);
    
    echo $produto->getPreco();
    
?>