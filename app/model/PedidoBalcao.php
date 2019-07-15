<?php
    
    class PedidoBalcao{
        
        private $id;
        private $pedidoId;
        private $nomeCliente;
        private $statusPedidoId;
        
        function __construct($id, $pedidoId, $nomeCliente, $statusPedidoId){
            
            $this->id             = $id;
            $this->pedidoId       = $pedidoId;
            $this->nomeCliente    = $nomeCliente;
            $this->statusPedidoId = $statusPedidoId;
        }
        
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getPedidoId(){
            return $this->pedidoId;
        }
        
        public function setPedidoId($pedidoId){
            $this->pedidoId = $pedidoId;
        }
        
        public function getNomeCliente(){
            return $this->nomeCliente;
        }
        
        public function setNomeCliente($nomeCliente){
            $this->nomeCliente = $nomeCliente;
        }
        
        public function getStatusPedidoId(){
            return $this->statusPedidoId;
        }
        
        public function setStatusPedidoId($statusPedidoId){
            $this->statusPedidoId = $statusPedidoId;
        }
    }
    
?>