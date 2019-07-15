<?php
    
    include_once '../../model/Cliente.php';
    
    class clienteDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function listarClientes(){
            
            $query  = "select * from cliente";
            $result = $this->conn->query($query);
            
            $clientes = array();
            
            while ($cliente = $result->fetch_array()) {
                
                $cliente2 = new Cliente(
                    $cliente['id'], 
                    $cliente['nome'], 
                    $cliente['telefone1'], 
                    $cliente['telefone2'], 
                    $cliente['telefone3'], 
                    $cliente['cep'], 
                    $cliente['endereco'], 
                    $cliente['numero'], 
                    $cliente['complemento'], 
                    $cliente['ponto_referencia'], 
                    $cliente['bairro'], 
                    $cliente['cidade'], 
                    $cliente['estado'], 
                    $cliente['ativo'], 
                    $cliente['cadastro'],
					$cliente['observacao']);
                    
                $clientes[] = $cliente2;
            }
            
            $this->conn->close();
            return $clientes;
        }
        
        function buscarCliente($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from cliente where id=?"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $id)) {
                
                return "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                return "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            $result = $stmt->get_result();
            $cliente = $result->fetch_assoc();
            
            $cliente2 = new Cliente(
                $cliente['id'], 
                $cliente['nome'], 
                $cliente['telefone1'], 
                $cliente['telefone2'], 
                $cliente['telefone3'], 
                $cliente['cep'], 
                $cliente['endereco'], 
                $cliente['numero'], 
                $cliente['complemento'], 
                $cliente['ponto_referencia'], 
                $cliente['bairro'], 
                $cliente['cidade'], 
                $cliente['estado'], 
                $cliente['ativo'], 
                $cliente['cadastro'],
				$cliente['observacao']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $cliente2;
        } 
        
        function atualizarCliente($cliente){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("update cliente SET nome=?, telefone1=?, telefone2=?, telefone3=?, cep=?, endereco=?, numero=?, complemento=?, ponto_referencia=?, bairro=?,cidade=?, estado=?, ativo=?, observacao=? where id=?"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
			$nome        = $cliente->getNome(); 
			$telefone1   = $cliente->getTelefone1(); 
			$telefone2   = $cliente->getTelefone2(); 
			$telefone3   = $cliente->getTelefone3(); 
			$cep         = $cliente->getCEP(); 
			$endereco    = $cliente->getEndereco(); 
			$numero      = $cliente->getNumero(); 
			$complemento = $cliente->getComplemento(); 
			$referencia  = $cliente->getPontoReferencia(); 
			$bairro      = $cliente->getBairro(); 
			$cidade      = $cliente->getCidade(); 
			$estado      = $cliente->getEstado(); 
			$ativo       = $cliente->getAtivo(); 
			$observacao  = $cliente->getObservacao(); 
			$id          = $cliente->getId();
			
            //bind
            if (!$stmt->bind_param("sssssssssissisi", 
								   $nome, 
								   $telefone1,
								   $telefone2, 
								   $telefone3, 
								   $cep, 
								   $endereco, 
								   $numero, 
								   $complemento, 
								   $referencia, 
								   $bairro, 
								   $cidade, 
								   $estado,
								   $ativo, 
								   $observacao,
								   $id)) {
                
                $retorno = "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                $retorno = "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //close
            $stmt->close();
            $this->conn->close();
            return $retorno;
        }
        
        function inserirCliente($cliente){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("insert into cliente (nome, telefone1, telefone2, telefone3, cep, endereco, numero, complemento, ponto_referencia, bairro, cidade, estado, ativo, observacao) VALUES  (?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            $nome        = $cliente->getNome();
            $telefone1   = $cliente->getTelefone1();
            $telefone2   = $cliente->getTelefone2();
            $telefone3   = $cliente->getTelefone3();
            $cep         = $cliente->getCEP();
            $endereco    = $cliente->getEndereco();
            $numero      = $cliente->getNumero();
            $complemento = $cliente->getComplemento();
            $referencia  = $cliente->getPontoReferencia();
            $bairro      = $cliente->getBairro();
            $cidade      = $cliente->getCidade();
            $estado      = $cliente->getEstado();
            $ativo       = $cliente->getAtivo();
			$observacao  = $cliente->getObservacao();
            
            //bind
            if (!$stmt->bind_param("sssssssssissis", 
                                   $nome, 
                                   $telefone1, 
                                   $telefone2, 
                                   $telefone3, 
                                   $cep, 
                                   $endereco, 
                                   $numero, 
                                   $complemento, 
                                   $referencia, 
                                   $bairro, 
                                   $cidade, 
                                   $estado, 
                                   $ativo,
								   $observacao)) {
                
                $retorno = "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                $retorno = "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //close
            $retorno = $stmt->insert_id;
            $stmt->close();
            $this->conn->close();
            return $retorno;
        }
        
        //***May have injection***
        function buscaTelefone($telefone) {
            
            $query = "select * from cliente where 
                        telefone1='".$telefone."' or 
                        telefone2='".$telefone."' or 
                        telefone3='".$telefone."'";
                
            //Se nao encontrar o telefone retorna um cliente com os campos NULL   
            $result = $this->conn->query($query);
            $cliente = $result->fetch_assoc();
            
            $cliente2 = new Cliente(
                $cliente['id'], 
                $cliente['nome'], 
                $cliente['telefone1'], 
                $cliente['telefone2'], 
                $cliente['telefone3'], 
                $cliente['cep'], 
                $cliente['endereco'], 
                $cliente['numero'], 
                $cliente['complemento'], 
                $cliente['ponto_referencia'], 
                $cliente['bairro'], 
                $cliente['cidade'], 
                $cliente['estado'], 
                $cliente['ativo'], 
                $cliente['cadastro'],
				$cliente['observacao']);
                
            $this->conn->close();
            return $cliente2;
        }
    } 
    
?>