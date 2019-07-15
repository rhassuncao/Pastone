<?php
    
    class Produto{
        
        private $id;
        private $nome;
        private $preco;
        private $descricao;
        private $ativo;
        private $categoria;
        
        function __construct($id, $nome, $preco, $descricao, $ativo, $categoria){
            
            $this->id        = $id;
            $this->nome      = $nome;
            $this->preco     = $preco;
            $this->descricao = $descricao;
            $this->ativo     = $ativo;
            $this->categoria = $categoria;
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
        
        public function getPreco(){
            return $this->preco;
        }
        
        public function setPreco($preco){
            $this->preco = $preco;
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
        
        public function getCategoria(){
            return $this->categoria;
        }
        
        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }
    }  
    
?>