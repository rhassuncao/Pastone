<?php
    
    class Mesa{
        
        private $id;
        private $nome;
        private $descricao;
        private $ativo;
        
        function __construct($id, $nome, $descricao, $ativo){
            
            $this->id        = $id;
            $this->nome      = $nome;
            $this->descricao = $descricao;
            $this->ativo     = $ativo;
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
        
        public function getDescricao(){
            return $this->descricao;
        }
        
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }
        
        public function getAtivo(){
            return $this->ativo;
        }
        
        public function setAtivo($ativo){
            $this->ativo = $ativo;
        }
    }
    
?>