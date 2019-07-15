<?php
    
    include_once '../../model/Pedido.php';
    
    class pedidoDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function inserirPedido($pedido){
            
            //prepare
            if (!($stmt = $this->conn->prepare("INSERT INTO pedido (recebido_por, forma_pagamento_id) VALUES (?,?)"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            $recebidoPor    = $pedido->getRecebidoPor();
            $formaPagamento = $pedido->getFormaPagamentoId();
            
            if($pedido->getFormaPagamentoId()==""){
                
                $formaPagamento =  NULL;
                
            } else {
                
                $formaPagamento = $pedido->getFormaPagamentoId();
            }
            
            //bind
            if (!$stmt->bind_param("ii", $recebidoPor , $formaPagamento)) {
                
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
        
        function buscarPedido($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from pedido where id=?"))) {
                
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
            $pedido = $result->fetch_assoc();
            
            $pedido2 = new pedido(
                $pedido['id'], 
                $pedido['recebido_por'],
                $pedido['forma_pagamento_id'],
                $pedido['lancado'],
                $pedido['tempo_inicio'],
                $pedido['tempo_fim']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $pedido2;
        } 
        
        function lancarPedidos(){
            
            $query = "update pedido set lancado = 1 where lancado = 0";
            
            $result = $this->conn->query($query);
            $pedido = $result->fetch_assoc();
            
            $this->conn->close();
        }
        
        function buscarNaoLancadoMaisAntigo(){
            
            $query = "select min(pedido.tempo_inicio) as mais_antigo from pedido where lancado = 0";
            
            $result = $this->conn->query($query);
            $maisAntigo = $result->fetch_assoc();
            
            $this->conn->close();
            return $maisAntigo['mais_antigo'];
        }
        
        function contarNaoLancado(){
            
            $query = "select count(*) as total from pedido where pedido.lancado = 0";
            
            $result = $this->conn->query($query);
            
            $total = $result->fetch_assoc();
            
            $total2 = $total['total'];
            
            $this->conn->close();
            return $total2;
        }
    } 
    
?>