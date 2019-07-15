<?php
    
    include_once '../../model/PedidoBalcao.php';
    
    class pedidoBalcaoDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function setEntregueTimePedidoBalcao($pedidoBalcaoId){
            
            //prepare
            if (!($stmt = $this->conn->prepare("update pedido set pedido.tempo_fim = (select now()) where pedido.id = 
                (select pedido_balcao.pedido_id from pedido_balcao where id = ?)"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $pedidoBalcaoId)) {
                
                return "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                return "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            $result = $stmt->get_result();
            
            //close
            $stmt->close();
            $this->conn->close();
            return $result;
        }
        
        function cancelarPedidoBalcao($pedidoBalcaoId){
            
            //prepare
            if (!($stmt = $this->conn->prepare("update pedido_balcao set status_pedido_id=3 where id=?"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $pedidoBalcaoId)) {
                
                return "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                return "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            $result = $stmt->get_result();
            
            //close
            $stmt->close();
            $this->conn->close();
            return $result;
        }  
        
        function mudarStatusPedidoBalcao($pedidoBalcaoId){
            
            //prepare
            if (!($stmt = $this->conn->prepare("update pedido_balcao set status_pedido_id=2 where id=?"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $pedidoBalcaoId)) {
                
                return "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                return "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            $result = $stmt->get_result();
                
            //close
            $stmt->close();
            $this->conn->close();
            return $result;
        }    
        
        function listarPedidosBalcaoPendente(){
            
            $query = "select * from pedido_balcao where status_pedido_id=1";
            $result = $this->conn->query($query);
            
            $pedidosBalcao = array();
            
            while ($pedidoBalcao = $result->fetch_array()) {
                
                $pedidoBalcao2 = new PedidoBalcao(
                    $pedidoBalcao['id'], 
                    $pedidoBalcao['pedido_id'], 
                    $pedidoBalcao['nome_cliente'], 
                    $pedidoBalcao['status_pedido_id']);
                
                $pedidosBalcao[] = $pedidoBalcao2;
            }
            
            $this->conn->close();
            return $pedidosBalcao;
        }
        
        function buscarPedidoBalcao($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from pedido_balcao where id=?"))) {
                
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
            $pedidoBalcao = $result->fetch_assoc();

            $pedidoBalcao2 = new pedidoBalcao(
                $pedidoBalcao['id'], 
                $pedidoBalcao['pedido_id'], 
                $pedidoBalcao['nome_cliente'], 
                $pedidoBalcao['status_pedido_id']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $pedidoBalcao2;
        }
        
        function inserirPedidoBalcao($pedidoBalcao){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("INSERT INTO pedido_balcao (pedido_id, nome_cliente, status_pedido_id) VALUES (?, ?, ?)"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            $pedidoId    = $pedidoBalcao->getPedidoId();
            $nomeCliente = $pedidoBalcao->getNomeCliente();
            $status      = $pedidoBalcao->getStatusPedidoId();
            
            if (!$stmt->bind_param("isi", $pedidoId, $nomeCliente, $status)) {
                
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
        
        function buscarNaoLancadoBalcao(){
            
            $query = "select forma_pagamento_id, sum(preco) as total from
                (select 
                    preco, forma_pagamento_id
                    
                from 
                    pedido_balcao, 
                    pedido, 
                    item, 
                    produto 
                    
                where pedido.lancado = 0 
                    and pedido.id = pedido_balcao.pedido_id 
                    and item.pedido_id = pedido.id 
                    and produto.id = item.produto_id
                    and pedido_balcao.status_pedido_id = 2) as table2
                    
                group by forma_pagamento_id;";
            
            $result = $this->conn->query($query);
                
            $totaisBalcao = array();
            
            while ($total = $result->fetch_array()) {
                
                $totaisBalcao[$total['forma_pagamento_id']] = $total['total'];
            }
            
            $this->conn->close();
            return $totaisBalcao;
        }
        
        function contarNaoLancadoBalcao(){
            
            $query = "select count(*) as total from pedido_balcao, pedido where pedido_balcao.pedido_id = pedido.id and pedido.lancado = 0";
            
            $result = $this->conn->query($query);
            
            $total = $result->fetch_assoc();
            
            $total2 = $total['total'];
            
            $this->conn->close();
            return $total2;
        }
    } 
    
?>