<?php
    
    header('Content-Type: application/json');
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/clienteDAO.php';
    include_once '../../model/Cliente.php';
    
    $telefone = $_POST['telefone'];
    
    $teste = array(); 
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $CDAO      = new clienteDAO($conn);
    $resultado = $CDAO->buscaTelefone($telefone);
    
    if($resultado->getId() == NULL){
        
        $teste['status']=false;
        
    }else {
        
        $teste['status']           = true;
        $teste['id']               = $resultado->getId(); 
        $teste['nome']             = $resultado->getNome(); 
        $teste['telefone1']        = $resultado->getTelefone1(); 
        $teste['telefone2']        = $resultado->getTelefone2(); 
        $teste['telefone3']        = $resultado->getTelefone3(); 
        $teste['cep']              = $resultado->getCEP(); 
        $teste['endereco']         = $resultado->getEndereco(); 
        $teste['numero']           = $resultado->getNumero(); 
        $teste['complemento']      = $resultado->getComplemento(); 
        $teste['ponto_referencia'] = $resultado->getPontoReferencia(); 
        $teste['bairro']           = $resultado->getBairro(); 
        $teste['cidade']           = $resultado->getCidade(); 
        $teste['estado']           = $resultado->getEstado(); 
        $teste['ativo']            = $resultado->getAtivo(); 
        $teste['cadastro']         = $resultado->getCadastro(); 
		$teste['observacao']       = $resultado->getObservacao(); 
    }
    
    echo json_encode($teste, JSON_PRETTY_PRINT);
?>