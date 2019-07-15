<?php
    
    include_once '../../model/Funcionario.php';
    
    class funcionarioDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function listarEntregadores(){
            
            $query = "select * from funcionario where categoria_funcionario=2";
            $result = $this->conn->query($query);
            
            $funcionarios = array();
            
            while ($funcionario = $result->fetch_array()) {
                
                $funcionario2 = new Funcionario(
                    $funcionario['id'],
                    $funcionario['categoria_funcionario'], 
                    $funcionario['nome'], 
                    $funcionario['telefone1'], 
                    $funcionario['telefone2'], 
                    $funcionario['telefone3'], 
                    $funcionario['cep'], 
                    $funcionario['endereco'], 
                    $funcionario['numero'], 
                    $funcionario['complemento'], 
                    $funcionario['ponto_referencia'], 
                    $funcionario['bairro'], 
                    $funcionario['cidade'], 
                    $funcionario['estado'], 
                    $funcionario['rg'],
                    $funcionario['cpf'],
                    $funcionario['data_nascimento'],
                    $funcionario['CTPS'],
                    $funcionario['salario'],
                    $funcionario['vale_transporte'],
                    $funcionario['vale_refeicao'],
                    $funcionario['ativo'], 
                    $funcionario['cadastro'],
                    $funcionario['email'],
                    $funcionario['senha']);
                
                $funcionarios[] = $funcionario2;
            }
            
            $this->conn->close();
            return $funcionarios;
        }
        
        function listarFuncionarios(){
            
            $query = "select * from funcionario";
            $result = $this->conn->query($query);
            
            $funcionarios = array();
            
            while ($funcionario = $result->fetch_array()) {
                
                $funcionario2 = new Funcionario(
                    $funcionario['id'],
                    $funcionario['categoria_funcionario'], 
                    $funcionario['nome'], 
                    $funcionario['telefone1'], 
                    $funcionario['telefone2'], 
                    $funcionario['telefone3'], 
                    $funcionario['cep'], 
                    $funcionario['endereco'], 
                    $funcionario['numero'], 
                    $funcionario['complemento'], 
                    $funcionario['ponto_referencia'], 
                    $funcionario['bairro'], 
                    $funcionario['cidade'], 
                    $funcionario['estado'], 
                    $funcionario['rg'],
                    $funcionario['cpf'],
                    $funcionario['data_nascimento'],
                    $funcionario['CTPS'],
                    $funcionario['salario'],
                    $funcionario['vale_transporte'],
                    $funcionario['vale_refeicao'],
                    $funcionario['ativo'], 
                    $funcionario['cadastro'],
                    $funcionario['email'],
                    $funcionario['senha']);
                
                $funcionarios[] = $funcionario2;
            }
            
            $this->conn->close();
            return $funcionarios;
        }
        
        function buscarFuncionario($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from funcionario  where id=?"))) {
                
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
            $funcionario = $result->fetch_assoc();
                
            $funcionario2 = new Funcionario(
                $funcionario['id'],
                $funcionario['categoria_funcionario'], 
                $funcionario['nome'], 
                $funcionario['telefone1'], 
                $funcionario['telefone2'], 
                $funcionario['telefone3'], 
                $funcionario['cep'], 
                $funcionario['endereco'], 
                $funcionario['numero'], 
                $funcionario['complemento'], 
                $funcionario['ponto_referencia'], 
                $funcionario['bairro'], 
                $funcionario['cidade'], 
                $funcionario['estado'], 
                $funcionario['rg'],
                $funcionario['cpf'],
                $funcionario['data_nascimento'],
                $funcionario['CTPS'],
                $funcionario['salario'],
                $funcionario['vale_transporte'],
                $funcionario['vale_refeicao'],
                $funcionario['ativo'], 
                $funcionario['cadastro'],
                $funcionario['email'],
                $funcionario['senha']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $funcionario2;
        } 
        
        function atualizarFuncionario($funcionario){
            
            $retorno = true;
			
			$categoria      = $funcionario->getCategoriaFuncionario(); 
			$nome           = $funcionario->getNome(); 
			$telefone1      = $funcionario->getTelefone1(); 
			$telefone2      = $funcionario->getTelefone2(); 
			$telefone3      = $funcionario->getTelefone3(); 
			$cep            = $funcionario->getCEP(); 
			$endereco       = $funcionario->getEndereco(); 
			$numero         = $funcionario->getNumero(); 
			$complemento    = $funcionario->getComplemento(); 
			$referencia     = $funcionario->getPontoReferencia(); 
			$bairro         = $funcionario->getBairro(); 
			$cidade         = $funcionario->getCidade(); 
			$estado         = $funcionario->getEstado(); 
			$RG             = $funcionario->getRG(); 
			$CPF            = $funcionario->getCPF(); 
			$data           = (($funcionario->getDataNascimento()=="")?"2000-01-01":$funcionario->getDataNascimento()); 
			$CTPS           = $funcionario->getCTPS(); 
			$salario        = (($funcionario->getSalario()=="")?0:$funcionario->getSalario());
			$valeTransporte = (($funcionario->getValeTransporte()=="")?0:$funcionario->getValeTransporte());
			$valeRefeicao   = (($funcionario->getValeRefeicao()=="")?0:$funcionario->getValeRefeicao());
			$ativo          = $funcionario->getAtivo(); 
			$email          = $funcionario->getEmail(); 
			$senha          = md5($funcionario->getSenha());
			$id             = $funcionario->getId();
            
			if($funcionario->getSenha() == ''){
				
				//prepare
				if (!($stmt = $this->conn->prepare("UPDATE funcionario SET categoria_funcionario=?, nome=?, telefone1=?, telefone2=?, telefone3=?, cep=?, endereco=?, numero=?, complemento=?, ponto_referencia=?, bairro=?, cidade=?, estado=?, rg=?, cpf=?, data_nascimento=?, ctps=?, salario=?, vale_transporte=?, vale_refeicao=?, ativo=?, email=? where id=?"))) {
					
					$retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
				}
				
				//bind
				if (!$stmt->bind_param("issssssssssssssssdddisi", 
									   $categoria, 
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
									   $RG, 
									   $CPF, 
									   $data, 
									   $CTPS, 
									   $salario,
									   $valeTransporte, 
									   $valeRefeicao, 
									   $ativo, 
									   $email,
									   $id)) {
					
					$retorno = "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
				}	
					
			} else {
				
				//prepare
				if (!($stmt = $this->conn->prepare("UPDATE funcionario SET categoria_funcionario=?, nome=?, telefone1=?, telefone2=?, telefone3=?, cep=?, endereco=?, numero=?, complemento=?, ponto_referencia=?, bairro=?, cidade=?, estado=?, rg=?, cpf=?, data_nascimento=?, ctps=?, salario=?, vale_transporte=?, vale_refeicao=?, ativo=?, email=?, senha=? where id=?"))) {

					$retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
				}
				
				//bind
				if (!$stmt->bind_param("issssssssssssssssdddissi", 
									   $categoria, 
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
									   $RG, 
									   $CPF, 
									   $data, 
									   $CTPS, 
									   $salario,
									   $valeTransporte, 
									   $valeRefeicao, 
									   $ativo, 
									   $email,
									   $senha,
									   $id)) {
					
					$retorno = "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
				}	
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
        
        function inserirFuncionario($funcionario){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("INSERT INTO funcionario (categoria_funcionario, nome, telefone1, telefone2, telefone3, cep, endereco, numero, complemento, ponto_referencia, bairro, cidade, estado, rg, cpf, data_nascimento, ctps, salario, vale_transporte, vale_refeicao, ativo, email, senha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
			$categoria      = $funcionario->getCategoriaFuncionario(); 
			$nome           = $funcionario->getNome(); 
			$telefone1      = $funcionario->getTelefone1(); 
			$telefone2      = $funcionario->getTelefone2(); 
			$telefone3      = $funcionario->getTelefone3(); 
			$cep            = $funcionario->getCEP(); 
			$endereco       = $funcionario->getEndereco(); 
			$numero         = $funcionario->getNumero(); 
			$complemento    = $funcionario->getComplemento(); 
			$referencia     = $funcionario->getPontoReferencia(); 
			$bairro         = $funcionario->getBairro(); 
			$cidade         = $funcionario->getCidade(); 
			$estado         = $funcionario->getEstado(); 
			$RG             = $funcionario->getRG(); 
			$CPF            = $funcionario->getCPF(); 
			$data           = (($funcionario->getDataNascimento()=="")?"2000-01-01":$funcionario->getDataNascimento()); 
			$CTPS           = $funcionario->getCTPS(); 
			$salario        = (($funcionario->getSalario()=="")?0:$funcionario->getSalario());
			$valeTransporte = (($funcionario->getValeTransporte()=="")?0:$funcionario->getValeTransporte());
			$valeRefeicao   = (($funcionario->getValeRefeicao()=="")?0:$funcionario->getValeRefeicao());
			$ativo          = $funcionario->getAtivo(); 
			$email          = $funcionario->getEmail(); 
			$senha          = md5($funcionario->getSenha());
			
            //bind
            if (!$stmt->bind_param("issssssssssssssssdddiss", 
								   $categoria, 
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
								   $RG, 
								   $CPF, 
								   $data, 
								   $CTPS, 
								   $salario,
								   $valeTransporte, 
								   $valeRefeicao, 
								   $ativo, 
								   $email,
								   $senha)) {
                
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
        
        function login($email, $senha){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from funcionario 
                        where email=? and senha=?"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            $senha = md5($senha);
            
            if (!$stmt->bind_param("ss", $email, $senha)) {
                
                return "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                return "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            $result      = $stmt->get_result();
            $funcionario = $result->fetch_assoc();
            
            $funcionario2 = new Funcionario(
                $funcionario['id'],
                $funcionario['categoria_funcionario'], 
                $funcionario['nome'], 
                $funcionario['telefone1'], 
                $funcionario['telefone2'], 
                $funcionario['telefone3'], 
                $funcionario['cep'], 
                $funcionario['endereco'], 
                $funcionario['numero'], 
                $funcionario['complemento'], 
                $funcionario['ponto_referencia'], 
                $funcionario['bairro'], 
                $funcionario['cidade'], 
                $funcionario['estado'], 
                $funcionario['rg'],
                $funcionario['cpf'],
                $funcionario['data_nascimento'],
                $funcionario['CTPS'],
                $funcionario['salario'],
                $funcionario['vale_transporte'],
                $funcionario['vale_refeicao'],
                $funcionario['ativo'], 
                $funcionario['cadastro'],
                $funcionario['email'],
                $funcionario['senha']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $funcionario2;
        }
        
        function calculaTotalEntregador($entregadorId){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select sum(bairro.taxa_entrega) from bairro, cliente, pedido_entrega where 
                        cliente.id=pedido_entrega.cliente_id 
                        and entregador_id = ? 
                        and status_pedido_id=2 
                        and entregador_pago=0
                        and cliente.bairro = bairro.id"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $entregadorId)) {
                
                return "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                return "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            $result = $stmt->get_result();
            $total = $result->fetch_assoc();
            
            $total2 = $total['sum(bairro.taxa_entrega)'];
            
            //close
            $stmt->close();
            $this->conn->close();
            return $total2;
        }
    } 
    
?>