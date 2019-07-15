<?php
    
    include_once '../functionsProduto.php';
    
    $categoriaId = $_POST['categoria'];
    
    echo "<option value='0'>--</option>".imprimeProdutosSelectCategoria($categoriaId, NULL);
    
?>