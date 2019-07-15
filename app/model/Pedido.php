<?php
    
    class Pedido{
        
        private $id;
        private $recebidoPor;
        private $formaPagamentoId;
        private $lancado;
        private $tempoInicio;
        private $tempoFim;
        
        function __construct($id, $recebidoPor, $formaPagamentoId, $lancado, $tempoInicio, $tempoFim){
            
            $this->id               = $id;
            $this->recebidoPor      = $recebidoPor;
            $this->formaPagamentoId = $formaPagamentoId;
            $this->lancado          = $lancado;
            $this->tempoInicio      = $tempoInicio;
            $this->tempoFim         = $tempoFim;
        }
        
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getRecebidoPor(){
            return $this->recebidoPor;
        }
        
        public function setRecebidoPor($recebidoPor){
            $this->recebidoPor = $recebidoPor;
        }
        
        public function getFormaPagamentoId(){
            return $this->formaPagamentoId;
        }
        
        public function setFormaPagamento($formaPagamentoId){
            $this->formaPagamento = $formaPagamentoId;
        }
        
        public function getLancado(){
            return $this->lancado;
        }
        
        public function setLancado($lancado){
            $this->lancado = $lancado;
        }
        
        public function getTempoInicio(){
            return $this->tempoInicio;
        }
        
        public function setTempoInicio($tempoInicio){
            $this->tempoInicio = $tempoInicio;
        }
        
        public function getTempoFim(){
            return $this->tempoFim;
        }
        
        public function setTempoFim($tempoFim){
            $this->tempoFim = $tempoFim;
        }
    }
    
?>