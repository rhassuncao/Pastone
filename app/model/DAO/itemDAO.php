<?php
    
    include_once '../../model/Item.php';
    
    class itemDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        //***May have injection***
        function listarItensPedido($id){
            
            $query  = "select * from item where pedido_id=".$id;
            $result = $this->conn->query($query);
            
            $itens = array();
            
            while ($item = $result->fetch_array()) {
                
                $item2 = new Item(
                    $item['id'], 
                    $item['produto_id'], 
                    $item['pedido_id'],
                    $item['observacao']);
                
                $itens[] = $item2;
            }
            
            $this->conn->close();
            return $itens;
        }
        
        function inserirItem($item){
            
            $retorno = true;
            //prepare
            if (!($stmt = $this->conn->prepare("INSERT INTO item (produto_id, pedido_id, observacao) VALUES (?, ?, ?)"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            $produtoId  = $item->getProdutoId(); 
            $pedidoId   = $item->getPedidoId(); 
            $observacao = $item->getObservacao();
			
			//bind
            if (!$stmt->bind_param("iis", $produtoId, $pedidoId, $observacao)) {
                
                return "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                return "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //close
            $stmt->close();
            $this->conn->close();
            return $retorno;
        }
    } 
    
?>