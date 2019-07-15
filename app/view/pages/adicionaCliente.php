<?php
    
    include_once '../functionsTratamentoString.php';
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/clienteDAO.php';
    
    $nome            = $_POST["nome"];
    $telefone1       = $_POST["telefone1"];
    $telefone2       = $_POST["telefone2"];
    $telefone3       = $_POST["telefone3"];
    $cep             = $_POST["cep"];
    $endereco        = $_POST["endereco"];
    $numero          = $_POST["numero"];
    $complemento     = $_POST["complemento"];
    $pontoReferencia = $_POST["pontoReferencia"];
    $bairro          = $_POST["bairro"];
    $cidade          = $_POST["cidade"];
    $estado          = $_POST["estado"];
    $ativo           = $_POST["ativo"];
    $flag            = $_POST["flag"];
	$observacao      = $_POST["observacao"];
    
    $telefone1 = telefoneApenasNumeros($telefone1);
    $telefone2 = telefoneApenasNumeros($telefone2);
    $telefone3 = telefoneApenasNumeros($telefone3);
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $CDAO = new clienteDAO($conn);
    
    $cliente = new Cliente(NULL, $nome, $telefone1, $telefone2, $telefone3, $cep, $endereco, $numero, $complemento, $pontoReferencia, $bairro, $cidade, $estado, $ativo, NULL, $observacao);
    
    $resultado = $CDAO->inserirCliente($cliente);
    
    if($flag=="OK"){
        
        echo $resultado;
        
    } else {
        
        if($resultado==true){
            
            header("Location: clientes.php");
            exit;
            
        } else {
            
            echo $resultado;
        }
    }
    
?>