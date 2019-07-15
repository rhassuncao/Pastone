<?php
    
    class Suporte{
        
        private $id;
        private $descricao;
        private $data;
        private $funcionarioId;
        private $resposta;
        private $statusId;
        
        function __construct($id, $descricao, $data, $funcionarioId, $resposta, $statusId){
            
            $this->id            = $id;
            $this->descricao     = $descricao;
            $this->data          = $data;
            $this->funcionarioId = $funcionarioId;
            $this->resposta      = $resposta;
            $this->statusId      = $statusId;
        }
        
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getDescricao(){
            return $this->descricao;
        }
        
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }
        
        public function getData(){
            return $this->data;
        }
        
        public function setData($data){
            $this->data = $data;
        }
        
        public function getFuncionarioId(){
            return $this->funcionarioId;
        }
        
        public function setFuncionarioId($funcionarioId){
            $this->funcionarioId = $funcionarioId;
        }
        
        public function getResposta(){
            return $this->resposta;
        }
        
        public function setResposta($resposta){
            $this->resposta = $resposta;
        }
        
        public function getStatusId(){
            return $this->statusId;
        }
        
        public function setStatusId($statusId){
            $this->statusId = $statusId;
        }
    }       
    
?>