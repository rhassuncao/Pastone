<?php
    
    class Item{
        
        private $id;
        private $produtoId;
        private $pedidoId;
        private $observacao;
        
        function __construct($id, $produtoId, $pedidoId, $observacao){
            
            $this->id         = $id;
            $this->produtoId  = $produtoId;
            $this->pedidoId   = $pedidoId;
            $this->observacao = $observacao;
        }
        
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getProdutoId(){
            return $this->produtoId;
        }
        
        public function setProdutoId($produtoId){
            $this->produtoId = $produtoId;
        }
        
        public function getPedidoId(){
            return $this->pedidoId;
        }
            
        public function setPedidoId($pedidoId){
            $this->pedidoId = $pedidoId;
        }
        
        public function getObservacao(){
            return $this->observacao;
        }
        
        public function setObservacao($observacao){
            $this->observacao = $observacao;
        }
    }
    
?>