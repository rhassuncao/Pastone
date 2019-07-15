<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/categoriaProdutoDAO.php';
    
    $id        = $_POST["id"];
    $nome      = $_POST["nome"];
    $ativo     = $_POST["ativo"];
    $descricao = $_POST["descricao"];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $CDAO = new categoriaProdutoDAO($conn);
    
    $categoriaProduto = new CategoriaProduto($id, $nome, $descricao, $ativo);
    
    $resultado = $CDAO->atualizarCategoriaProduto($categoriaProduto);
    
    if($resultado==true){
        
        header("Location: categoriasProduto.php");
        exit;
        
    } else {
        
        echo $resultado;
    }
    
?>