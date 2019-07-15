<?php
    
    include_once '../../model/Configs.php';
    
    class configsDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function restaurarConfiguracoes(){
            
            $query = "CALL `refresh_database`()";
            
            $result = $this->conn->query($query);
            $configs = $result->fetch_assoc();
            
            $this->conn->close();
            return $configs;
        }
        
        function buscarConfigs(){
            
            $query = "select * from configs";
            
            $result = $this->conn->query($query);
            $configs = $result->fetch_assoc();
            
            $configs2 = new Configs(
                $configs['id'], 
                $configs['nome_cliente'],
                $configs['facebook'],
                $configs['site'],
                $configs['vias_balcao'],
                $configs['vias_entrega'],
                $configs['vias_mesa'],
                $configs['vias_mesa_single'],
                $configs['nove_linhas_depois'],
                $configs['numero_colunas'],
                $configs['aquisicao'],
                $configs['expiracao'],
				$configs['endereco'],
				$configs['numero'],
				$configs['bairro'],
				$configs['cidade'],
				$configs['estado']);
            
            $this->conn->close();
            return $configs2;
        }
        
        function atualizarConfigs($configs){
            
            $retorno = true;
            
            //prepare
			if (!($stmt = $this->conn->prepare("update configs SET nome_cliente=?, facebook=?, site=?, vias_balcao=?, vias_entrega=?, vias_mesa=?, vias_mesa_single=?, nove_linhas_depois=?, numero_colunas=?, endereco=?, numero=?, bairro=?, cidade=?, estado=?"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            $nomeCliente      = $configs->getNomeCliente();
            $facebook         = $configs->getFacebook(); 
            $site             = $configs->getSite();
			$viasBalcao       = $configs->getViasBalcao();
			$viasEntrega      = $configs->getViasEntrega(); 
			$viasMesa         = $configs->getViasMesa(); 
			$viasMesaSingle   = $configs->getViasMesaSingle(); 
			$noveLinhasDepois = $configs->getNoveLinhasDepois(); 
			$numeroColunas    = $configs->getNumeroColunas(); 
			$endereco         = $configs->getEndereco(); 
			$numero           = $configs->getNumero(); 
			$bairro           = $configs->getBairro(); 
			$cidade           = $configs->getCidade(); 
			$estado           = $configs->getEstado();
                
            if (!$stmt->bind_param("sssiiiiiissssi", 
                                   $nomeCliente, 
                                   $facebook, 
                                   $site,
								   $viasBalcao, 
								   $viasEntrega, 
								   $viasMesa, 
								   $viasMesaSingle, 
								   $noveLinhasDepois, 
								   $numeroColunas, 
								   $endereco, 
								   $numero, 
								   $bairro, 
								   $cidade, 
								   $estado)) {
                
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
    } 
    
?>