<?php
    
    class Bairro{
        
        private $id;
        private $nome;
        private $taxaEntrega;
        
        function __construct($id, $nome, $taxaEntrega){
            
            $this->id          = $id;
            $this->nome        = $nome;
            $this->taxaEntrega = $taxaEntrega;
        }
        
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function setNome($nome){
            $this->nome = $nome;
        }
        
        public function getTaxaEntrega(){
            return $this->taxaEntrega;
        }
        
        public function setTaxaEntrega($taxaEntrega){
            $this->taxaEntrega = $taxaEntrega;
        }
    }
    
?>