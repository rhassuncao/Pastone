<?php
    
    include_once '../../model/PedidoEntrega.php';
    
    class pedidoEntregaDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function cancelarPedidoEntrega($pedidoEntregaId){
            
            //prepare
            if (!($stmt = $this->conn->prepare("update pedido_entrega set status_pedido_id=3 where id=?"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $pedidoEntregaId)) {
                
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
        
        function setEntregueTimePedidoEntrega($pedidoEntregaId){
                
            //prepare
            if (!($stmt = $this->conn->prepare("update pedido set pedido.tempo_fim = (select now()) where pedido.id = 
                (select pedido_entrega.pedido_id from pedido_entrega where id = ?)"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $pedidoEntregaId)) {
                
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
        
        function mudarStatusPedidoEntrega($pedidoEntregaId){
                
            //prepare
            if (!($stmt = $this->conn->prepare("update pedido_entrega set status_pedido_id=2 where id=?"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $pedidoEntregaId)) {
                
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
        
        function mudarEntregadorPedidoEntrega($entregadorId, $pedidoEntregaId){
            
            //prepare
            if (!($stmt = $this->conn->prepare("update pedido_entrega set entregador_id=? where id=?"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("ii", $entregadorId, $pedidoEntregaId)) {
                
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
        
        function listarPedidosEntregaPendente(){
            
            $query = "select * from pedido_entrega where status_pedido_id=1";
            $result = $this->conn->query($query);
            
            $pedidosEntrega = array();
            
            while ($pedidoEntrega = $result->fetch_array()) {
                
                $pedidoEntrega2 = new PedidoEntrega(
                    $pedidoEntrega['id'], 
                    $pedidoEntrega['pedido_id'], 
                    $pedidoEntrega['cliente_id'], 
                    $pedidoEntrega['entregador_id'],
                    $pedidoEntrega['troco'],
                    $pedidoEntrega['status_pedido_id'],
                    $pedidoEntrega['entregador_pago']);
                
                $pedidosEntrega[] = $pedidoEntrega2;
            }
            
            $this->conn->close();
            return $pedidosEntrega;
        }
        
        function buscarPedidoEntrega($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from pedido_entrega where id=?"))) {
                
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
            $pedidoEntrega = $result->fetch_assoc();
            
            $pedidoEntrega2 = new pedidoEntrega(
                $pedidoEntrega['id'], 
                $pedidoEntrega['pedido_id'],
                $pedidoEntrega['cliente_id'], 
                $pedidoEntrega['entregador_id'],
                $pedidoEntrega['troco'],
                $pedidoEntrega['status_pedido_id'],
                $pedidoEntrega['entregador_pago']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $pedidoEntrega2;
        }
        
        function inserirPedidoEntrega($pedidoEntrega){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("insert into pedido_entrega (pedido_id, cliente_id, entregador_id, troco, status_pedido_id) VALUES (?, ?, ?, ?, ?)"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            $pedidoId       = $pedidoEntrega->getPedidoId();
            $clienteId      = $pedidoEntrega->getClienteId();
            $entregadorId   = $pedidoEntrega->getEntregadorId();
			$statusPedidoId = $pedidoEntrega->getStatusPedidoId();
            
            if($pedidoEntrega->getTroco()==""){
                
                $troco = NULL;
                
            } else {
                
                $troco = $pedidoEntrega->getTroco();
            }
            
			if (!$stmt->bind_param("iiidi", $pedidoId, $clienteId, $entregadorId, $troco, $statusPedidoId)) {
                
                return "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                return "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //close
            $retorno = $stmt->insert_id;
            $stmt->close();
            $this->conn->close();
            return $retorno;
        }
        
        function buscarNaoLancadoEntrega(){
            
            $query = "select forma_pagamento_id, sum(preco) as total from
                (select 
                    preco, forma_pagamento_id
                    
                from 
                    pedido_entrega, 
                    pedido, 
                    item, 
                    produto 
                    
                where pedido.lancado = 0 
                    and pedido.id = pedido_entrega.pedido_id 
                    and item.pedido_id = pedido.id 
                    and produto.id = item.produto_id
                    and pedido_entrega.status_pedido_id = 2) as table2
                    
                group by forma_pagamento_id;";
            
            $result = $this->conn->query($query);
            
            $totaisBalcao = array();
            
            while ($total = $result->fetch_array()) {
                
                $totaisBalcao[$total['forma_pagamento_id']] = $total['total'];
            }
            
            $this->conn->close();
            return $totaisBalcao;
        }
        
        //***May have injection***
        //Lista os pedidos de um entregador que ja foram entregues e nao foram pagos
        function listarPedidosEntregador($entregadorId){
            
            $query = "select * from pedido_entrega where 
                entregador_id=".$entregadorId." 
                and status_pedido_id=2 
                and entregador_pago=0";
            $result = $this->conn->query($query);
            
            $pedidosEntrega = array();
            
            while ($pedidoEntrega = $result->fetch_array()) {
                
                $pedidoEntrega2 = new PedidoEntrega(
                    $pedidoEntrega['id'], 
                    $pedidoEntrega['pedido_id'],
                    $pedidoEntrega['cliente_id'], 
                    $pedidoEntrega['entregador_id'],
                    $pedidoEntrega['troco'],
                    $pedidoEntrega['status_pedido_id'],
                    $pedidoEntrega['entregador_pago']);
                
                $pedidosEntrega[] = $pedidoEntrega2;
            }
            
            $this->conn->close();
            return $pedidosEntrega;
        }
        
        function zerarEntregas($entregadorId){
            
            //prepare
            if (!($stmt = $this->conn->prepare("update pedido_entrega set entregador_pago=1 where entregador_id=?"))) {
                
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
            
            //close
            $stmt->close();
            $this->conn->close();
            return $result;
        }
        
        function contarNaoLancadoEntrega(){
            
            $query = "select count(*) as total from pedido_entrega, pedido where pedido_entrega.pedido_id = pedido.id and pedido.lancado = 0";
            
            $result = $this->conn->query($query);
            
            $total = $result->fetch_assoc();
            
            $total2 = $total['total'];
            
            $this->conn->close();
            return $total2;
        }
    }
    
?>