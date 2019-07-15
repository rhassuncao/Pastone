<?php
    
    class PedidoEntrega{
        
        private $id;
        private $clienteId;
        private $entregadorId;
        private $pedidoId;
        private $troco;
        private $statusPedidoId;
        private $entregadorPago;
        
        function __construct($id, $pedidoId, $clienteId, $entregadorId, $troco, $statusPedidoId, $entregadorPago){
            
            $this->id             = $id;
            $this->pedidoId       = $pedidoId;
            $this->clienteId      = $clienteId;
            $this->entregadorId   = $entregadorId;
            $this->troco          = $troco;
            $this->statusPedidoId = $statusPedidoId;
            $this->entregadorPago = $entregadorPago;
        }
        
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getClienteId(){
            return $this->clienteId;
        }
        
        public function setClienteId($clienteId){
            $this->clienteId = $clienteId;
        }
        
        public function getEntregadorId(){
            return $this->entregadorId;
        }
        
        public function setEntregadorId($entregadorId){
            $this->entregadorId = $entregadorId;
        }
        
        public function getPedidoId(){
            return $this->pedidoId;
        }
        
        public function setPedidoId($pedidoId){
            $this->pedidoId = $pedidoId;
        }
        
        public function getTroco(){
            return $this->troco;
        }
        
        public function setTroco($troco){
            $this->troco = $troco;
        }
        
        public function getStatusPedidoId(){
            return $this->statusPedidoId;
        }
        
        public function setStatusPedidoId($statusPedidoId){
            $this->statusPedidoId = $statusPedidoId;
        }
        
        public function getEntregadorPago(){
            return $this->entregadorPago;
        }
        
        public function setEntregadorPago($entregadorPago){
            $this->entregadorPago = $entregadorPago;
        }
    } 
    
?>