<?php
    
    include_once '../../model/Suporte.php';
    
    class suporteDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function listarSuportes(){
            
            $query = "select * from suporte";
            $result = $this->conn->query($query);
            
            $suportes = array();
            
            while ($suporte = $result->fetch_array()) {
                
                $suporte2 = new Suporte(
                    $suporte['id'], 
                    $suporte['descricao'],
                    $suporte['data'],
                    $suporte['funcionario_id'],
                    $suporte['resposta'], 
                    $suporte['status_id']);
                
                $suportes[] = $suporte2;
            }
            
            $this->conn->close();
            return $suportes;
        }
        
        function buscarSuporte($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from suporte where id=?"))) {
                
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
            $suporte = $result->fetch_assoc();
            
            $suporte2 = new Suporte(
                $suporte['id'], 
                $suporte['descricao'],
                $suporte['data'],
                $suporte['funcionario_id'],
                $suporte['resposta'], 
                $suporte['status_id']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $suporte2;
        } 
        
        function inserirSuporte($suporte){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("INSERT INTO suporte (descricao, funcionario_id) VALUES (?,?)"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            $desc   = $suporte->getDescricao();
            $funcId = $suporte->getFuncionarioId();
            
            if (!$stmt->bind_param("si", $desc, $funcId)) {
                
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