<?php
    
    $id        = $_POST["id"];
    $nome      = $_POST["nome"];
    $preco     = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $ativo     = $_POST["ativo"];
    $categoria = $_POST["categoria"];
    
    $preco     = str_replace(",",".",$preco);
    
    include '../../controller/connectionFactory.php';
    $cf = new connectionFactory();
    $conn = $cf->getConnection();
    
    include '../../model/DAO/produtoDAO.php';
    $CDAO = new produtoDAO($conn);
    
    $produto = new Produto($id, $nome, $preco, $descricao, $ativo, $categoria);
    
    $resultado = $CDAO->atualizarProduto($produto);
    
    if($resultado==true){
        
        header("Location: produtos.php");
        exit;
        
    } else {
        
        echo $resultado;
    }
    
?>