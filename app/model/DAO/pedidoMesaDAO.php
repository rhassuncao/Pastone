<?php
    
    include_once '../../model/PedidoMesa.php';
    
    class pedidoMesaDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function cancelarPedidoMesa($pedidoMesaId){
            
            //prepare
            if (!($stmt = $this->conn->prepare("update pedido_mesa set status_pedido_id=3 where id=?"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $pedidoMesaId)) {
                
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
        
        function fecharMesa($mesaId){
            
            //prepare
            if (!($stmt = $this->conn->prepare("update pedido_mesa set aberto=0 where mesa_id=?"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $mesaId)) {
                
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
        
        function setFormaPagamentoMesa($mesaId, $formaPagamentoId){
            
            //prepare
            if (!($stmt = $this->conn->prepare("update 
	               pedido 
                set 
                    pedido.forma_pagamento_id = ? 
                where 
                    pedido.id in(
                        
                        select 
                            pedido_mesa.pedido_id 
                        from 
                            pedido_mesa 
                        where 
                            pedido_mesa.mesa_id = ? and 
                            aberto = 1 and
							pedido_mesa.status_pedido_id<>3);"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("ii", $formaPagamentoId, $mesaId)) {
                
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
        
        //***May have injection***
        function listarPedidosMesa($mesa){
            
            $query = "select * from pedido_mesa where mesa_id=".$mesa." and aberto = 1";
            $result = $this->conn->query($query);
            
            $pedidosMesa = array();
            
            while ($pedidoMesa = $result->fetch_array()) {
                
                $pedidoMesa2 = new PedidoMesa(
                    $pedidoMesa['id'], 
                    $pedidoMesa['pedido_id'], 
                    $pedidoMesa['mesa_id'], 
                    $pedidoMesa['status_pedido_id']);
                
                $pedidosMesa[] = $pedidoMesa2;
            }
            
            $this->conn->close();
            return $pedidosMesa;
        }
        
        //***May have injection***
        function listarPedidosMesaNaoCancelados($mesa){
            
            $query = "select * from pedido_mesa where mesa_id=".$mesa." and status_pedido_id<>3 and aberto = 1";
            $result = $this->conn->query($query);
            
            $pedidosMesa = array();
            
            while ($pedidoMesa = $result->fetch_array()) {
                
                $pedidoMesa2 = new PedidoMesa(
                    $pedidoMesa['id'], 
                    $pedidoMesa['pedido_id'], 
                    $pedidoMesa['mesa_id'], 
                    $pedidoMesa['status_pedido_id']);
                
                $pedidosMesa[] = $pedidoMesa2;
            }
            
            $this->conn->close();
            return $pedidosMesa;
        }
        
        function buscarPedidoMesa($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from pedido_mesa where id=?"))) {
                
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
            $pedidoMesa  = $result->fetch_assoc();
            
            $pedidoMesa2 = new pedidoMesa(
                $pedidoMesa['id'], 
                $pedidoMesa['pedido_id'], 
                $pedidoMesa['mesa_id'], 
                $pedidoMesa['status_pedido_id']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $pedidoMesa2;
        }
        
        function inserirPedidoMesa($pedidoMesa){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("insert into pedido_mesa (pedido_id, mesa_id, status_pedido_id) VALUES (?, ?, ?)"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            $pedidoId       = $pedidoMesa->getPedidoId();
            $mesaId         = $pedidoMesa->getMesaId();
			$statusPedidoId = $pedidoMesa->getStatusPedidoId();
                
            if (!$stmt->bind_param("iii", $pedidoId, $mesaId, $statusPedidoId)) {
                
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
        
        function buscarNaoLancadoMesa(){
            
            $query = "select forma_pagamento_id, sum(preco) as total from
                (select 
                    preco, forma_pagamento_id
                    
                from 
                    pedido_mesa, 
                    pedido, 
                    item, 
                    produto 
                    
                where 
					pedido.lancado = 0 
                    and pedido.id = pedido_mesa.pedido_id 
                    and item.pedido_id = pedido.id 
                    and produto.id = item.produto_id
                    and pedido_mesa.status_pedido_id <> 3
					and pedido_mesa.aberto = 0) as table2
                    
                group by forma_pagamento_id;";
            
            $result = $this->conn->query($query);
            
            $totaisBalcao = array();
            
            while ($total = $result->fetch_array()) {
                
                $totaisBalcao[$total['forma_pagamento_id']] = $total['total'];
            }
            
            $this->conn->close();
            return $totaisBalcao;
        }
        
        function contarNaoLancadoMesa(){
            
            $query = "select count(*) as total from pedido_mesa, pedido where pedido_mesa.pedido_id = pedido.id and pedido.lancado = 0";
            
            $result = $this->conn->query($query);
            
            $total = $result->fetch_assoc();
            
            $total2 = $total['total'];
            
            $this->conn->close();
            return $total2;
        }
        
        function mudarStatusPedidoMesa($pedidoMesaId){
            
            //prepare
            if (!($stmt = $this->conn->prepare("update pedido_mesa set status_pedido_id=2 where id=?"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $pedidoMesaId)) {
                
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
        
        function setEntregueTimePedidoMesa($pedidoMesaId){
            
            //prepare
            if (!($stmt = $this->conn->prepare("update pedido set pedido.tempo_fim = (select now()) where pedido.id = 
                (select pedido_mesa.pedido_id from pedido_mesa where id = ?)"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $pedidoMesaId)) {
                
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
		
		function listarPedidosMesaPendente(){
			
			$query = "select * from pedido_mesa where status_pedido_id=1";
			$result = $this->conn->query($query);
			
			$pedidosMesa = array();
			
			while ($pedidoMesa = $result->fetch_array()) {
				
				$pedidoMesa2 = new PedidoMesa(
					$pedidoMesa['id'], 
					$pedidoMesa['pedido_id'], 
					$pedidoMesa['mesa_id'], 
					$pedidoMesa['status_pedido_id']);
				
				$pedidosMesa[] = $pedidoMesa2;
			}
			
			$this->conn->close();
			return $pedidosMesa;
		}
    } 
    
?>