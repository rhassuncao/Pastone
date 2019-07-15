<?php
    
    class PedidoMesa{
        
        private $id;
        private $pedidoId;
        private $mesaId;
        private $statusPedidoId;
        
        function __construct($id, $pedidoId, $mesaId, $statusPedidoId){
            
            $this->id             = $id;
            $this->pedidoId       = $pedidoId;
            $this->mesaId         = $mesaId;
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
        
        public function getMesaId(){
            return $this->mesaId;
        }
        
        public function setMesaId($mesaId){
            $this->mesaId = $mesaId;
        }
        
        public function getStatusPedidoId(){
            return $this->statusPedidoId;
        }
        
        public function setStatusPedidoId($statusPedidoId){
            $this->statusPedidoId = $statusPedidoId;
        }
    }  
    
?>