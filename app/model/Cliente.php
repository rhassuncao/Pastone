<?php
    
    class Cliente{
        
        private $id;
        private $nome;
        private $telefone1;
        private $telefone2;
        private $telefone3;
        private $CEP;
        private $endereco;
        private $numero;
        private $complemento;
        private $pontoReferencia;
        private $bairro;
        private $cidade;
        private $estado;
        private $ativo;
        private $cadastro;
		private $observacao;
        
		function __construct($id, $nome, $telefone1, $telefone2, $telefone3, $CEP, $endereco, $numero, $complemento, $pontoReferencia, $bairro, $cidade,$estado, $ativo, $cadastro, $observacao){
            
            $this->id              = $id;
            $this->nome            = $nome;
            $this->telefone1       = $telefone1;
            $this->telefone2       = $telefone2;
            $this->telefone3       = $telefone3;
            $this->CEP             = $CEP;
            $this->endereco        = $endereco;
            $this->numero          = $numero;
            $this->complemento     = $complemento;
            $this->pontoReferencia = $pontoReferencia;
            $this->bairro          = $bairro;
            $this->cidade          = $cidade;
            $this->estado          = $estado;
            $this->ativo           = $ativo;
            $this->cadastro        = $cadastro;
			$this->observacao      = $observacao;
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
        
        public function getTelefone1(){
            return $this->telefone1;
        }
        
        public function setTelefone1($telefone1){
            $this->telefone1 = $telefone1;
        }
        
        public function getTelefone2(){
            return $this->telefone2;
        }
        
        public function setTelefone2($telefone2){
            $this->telefone2 = $telefone2;
        }
        
        public function getTelefone3(){
            return $this->telefone3;
        }
        
        public function setTelefone3($telefone3){
            $this->telefone3 = $telefone3;
        }
        
        public function getCEP(){
            return $this->CEP;
        }
        
        public function setCEP($CEP){
            $this->CEP = $CEP;
        }
        
        public function getEndereco(){
            return $this->endereco;
        }
        
        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }
        
        public function getNumero(){
            return $this->numero;
        }
        
        public function setNumero($numero){
            $this->numero = $numero;
        }
        
        public function getComplemento(){
            return $this->complemento;
        }
        
        public function setComplemento($complemento){
            $this->complemento = $complemento;
        }
        
        public function getPontoReferencia(){
            return $this->pontoReferencia;
        }
        
        public function setPontoReferencia($pontoReferencia){
            $this->pontoReferencia = $pontoReferencia;
        }
        
        public function getBairro(){
            return $this->bairro;
        }
        
        public function setBairro($bairro){
            $this->bairro = $bairro;
        }
        
        public function getCidade(){
            return $this->cidade;
        }
        
        public function setCidade($cidade){
            $this->cidade = $cidade;
        }
        
        public function getEstado(){
            return $this->estado;
        }
        
        public function setEstado($estado){
            $this->estado = $estado;
        }
        
        public function getAtivo(){
            return $this->ativo;
        }
        
        public function setAtivo($ativo){
            $this->ativo = $ativo;
        }
        
        public function getCadastro(){
            return $this->cadastro;
        }
        
        public function setCadastro($cadastro){
            $this->cadastro = $cadastro;
        }  
		
		public function getObservacao(){
			return $this->observacao;
		}
		
		public function setObservacao($observacao){
			$this->observacao= $observacao;
		} 
    }
    
?>