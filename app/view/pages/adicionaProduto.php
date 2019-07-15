<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/produtoDAO.php';
    include_once '../functionsTratamentoString.php';
    
    $nome      = $_POST["nome"];
    $preco     = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $ativo     = $_POST["ativo"];
    $categoria = $_POST["categoria"];
    
    $preco     = valorMoedaPonto($preco);
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $CDAO = new produtoDAO($conn);
    
    $produto = new Produto(NULL, $nome, $preco, $descricao, $ativo, $categoria);
    
    $resultado = $CDAO->inserirProduto($produto);
    
    if($resultado == true){
        
        header("Location: produtos.php");
        exit;
        
    } else {
        
        echo $resultado;
    }
    
?>