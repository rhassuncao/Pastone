<?php
    
    include_once '../functionsTratamentoString.php';
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/funcionarioDAO.php';
    
    $id                   = $_POST["id"];
    $categoriaFuncionario = $_POST["categoriaFuncionario"];
    $nome                 = $_POST["nome"];
    $telefone1            = $_POST["telefone1"];
    $telefone2            = $_POST["telefone2"];
    $telefone3            = $_POST["telefone3"];
    $CEP                  = $_POST["cep"];
    $endereco             = $_POST["endereco"];
    $numero               = $_POST["numero"];
    $complemento          = $_POST["complemento"];
    $pontoReferencia      = $_POST["pontoReferencia"];
    $bairro               = $_POST["bairro"];
    $cidade               = $_POST["cidade"];
    $estado               = $_POST["estado"];
    $RG                   = $_POST["rg"];
    $CPF                  = $_POST["cpf"];
    $dataNascimento       = $_POST["dataNascimento"];
    $CTPS                 = $_POST["ctps"];
    $salario              = $_POST["salario"];
    $valeTransporte       = $_POST["valeTransporte"];
    $valeRefeicao         = $_POST["valeRefeicao"];
    $ativo                = $_POST["ativo"];
    $email                = $_POST["email"];
    $senha                = $_POST["senha"];
    
    $telefone1      = telefoneApenasNumeros($telefone1);
    $telefone2      = telefoneApenasNumeros($telefone2);
    $telefone3      = telefoneApenasNumeros($telefone3);
    
    $salario        = valorMoedaPonto($salario);
    $valeTransporte = valorMoedaPonto($valeTransporte);
    $valeRefeicao   = valorMoedaPonto($valeRefeicao);
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $CDAO = new funcionarioDAO($conn);
    
    $funcionario = new Funcionario($id, $categoriaFuncionario, $nome, $telefone1, $telefone2, $telefone3, $CEP, $endereco, $numero, $complemento, $pontoReferencia, $bairro, $cidade, $estado,  $RG, $CPF, $dataNascimento, $CTPS, $salario, $valeTransporte, $valeRefeicao, $ativo, NULL, $email, $senha);
    
    $resultado = $CDAO->atualizarFuncionario($funcionario);
    
    if($resultado==true){
        
        header("Location: funcionarios.php");
        exit;
        
    } else {
        
        echo $resultado;
    }
    
?>