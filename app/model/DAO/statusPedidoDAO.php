<?php
    
    include_once '../../model/StatusPedido.php';
    
    class statusPedidoDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function buscarStatusPedido($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from status_pedido where id=?"))) {
                
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
            $statusPedido = $result->fetch_assoc();
            
            $statusPedido2 = new StatusPedido(
                $statusPedido['id'], 
                $statusPedido['nome']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $statusPedido2;
        } 
    } 
    
?>