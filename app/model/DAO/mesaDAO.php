<?php
    
    include_once '../../model/Mesa.php';
    
    class mesaDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function listarMesas(){
            
            $query = "select * from mesa";
            $result = $this->conn->query($query);
            
            $mesas = array();
            
            while ($mesa = $result->fetch_array()) {
                
                $mesa2 = new Mesa(
                    $mesa['id'], 
                    $mesa['nome'],
                    $mesa['descricao'], 
                    $mesa['ativo']);
                
                $mesas[] = $mesa2;
            }
            
            $this->conn->close();
            return $mesas;
        }
        
        function buscarMesa($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from mesa where id=?"))) {
                
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
            $mesa = $result->fetch_assoc();
            
            $mesa2 = new Mesa(
                $mesa['id'], 
                $mesa['nome'],
                $mesa['descricao'], 
                $mesa['ativo']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $mesa2; 
        } 
        
        function atualizarMesa($mesa){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("UPDATE mesa SET nome=?, descricao=?, ativo=? where id=?"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
			
			$nome      = $mesa->getNome();
			$descricao = $mesa->getDescricao(); 
			$ativo     = $mesa->getAtivo();
			$id        = $mesa->getId();
            
            //bind
            if (!$stmt->bind_param("ssii", $nome, $descricao, $ativo, $id)) {
                
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
        
        function inserirMesa($mesa){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("INSERT INTO mesa (nome, descricao, ativo) VALUES (?,?,?)"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
			
			$nome      = $mesa->getNome();
			$descricao = $mesa->getDescricao(); 
			$ativo     = $mesa->getAtivo();
			$id        = $mesa->getId();
            
            //bind
			if (!$stmt->bind_param("ssi", $nome, $descricao, $ativo)) {
                
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