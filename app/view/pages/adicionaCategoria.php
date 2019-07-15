<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/categoriaProdutoDAO.php';
    
    $nome      = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $ativo     = $_POST["ativo"];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $CDAO = new categoriaProdutoDAO($conn);
    
    $categoria = new CategoriaProduto(NULL, $nome, $descricao, $ativo);
    
    $resultado = $CDAO->inserirCategoria($categoria);
    
    if($resultado==true){
        
        header("Location: categoriasProduto.php");
        exit;
        
    } else {
        
        echo $resultado;
    }
    
?>