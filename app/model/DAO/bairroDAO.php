<?php
    
    include_once '../../model/Bairro.php';
    
    class bairroDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function listarBairros(){
            
            $query  = "select * from bairro";
            $result = $this->conn->query($query);
            
            $bairros = array();
            
            while ($bairro = $result->fetch_array()) {
                
                $bairro2 = new Bairro(
                    $bairro['id'], 
                    $bairro['nome_bairro'],
                    $bairro['taxa_entrega']);
                
                $bairros[] = $bairro2;
            }
            
            $this->conn->close();
            return $bairros;
        }
        
        function buscarBairro($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from bairro where id=?"))) {
                
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
            $bairro = $result->fetch_assoc();
            
            $bairro2 = new Bairro(
                $bairro['id'], 
                $bairro['nome_bairro'],
                $bairro['taxa_entrega']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $bairro2;
        } 
        
        function atualizarBairro($bairro){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("UPDATE bairro SET nome_bairro=?, taxa_entrega=? where id=?"))) {
				
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
			
            //bind
            $nome        = $bairro->getNome();
            $taxaEntrega = $bairro->getTaxaEntrega();
            $id          = $bairro->getId();
            
            if (!$stmt->bind_param("sdi", $nome, $taxaEntrega, $id)) {
                
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
        
        function inserirBairro($bairro){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("INSERT INTO bairro (nome_bairro, taxa_entrega) VALUES (?,?)"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            $nome        = $bairro->getNome();
            $taxaEntrega = $bairro->getTaxaEntrega();
                
            if (!$stmt->bind_param("sd", $nome, $taxaEntrega)) {
                
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