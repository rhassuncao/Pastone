<?php
    
    include_once '../../model/Estado.php';
    
    class estadoDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function listarEstados(){
            
            $query = "select * from estado";
            $result = $this->conn->query($query);
            
            $estados = array();
            
            while ($estado = $result->fetch_array()) {
                
                $estado2 = new estado(
                    $estado['id'], 
                    $estado['nome']);
                
                $estados[] = $estado2;
            }
            
            $this->conn->close();
            return $estados;
        }
        
        function buscarEstado($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from estado where id=?"))) {
                
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
            $estado = $result->fetch_assoc();
                
            $estado2 = new estado(
                $estado['id'], 
                $estado['nome']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $estado2;   
        } 
    } 
    
?>