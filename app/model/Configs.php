<?php
    
    class Configs{
        
        private $id;
        private $nomeCliente;
        private $facebook;
        private $site;
        private $viasBalcao;
        private $viasEntrega;
        private $viasMesa;
        private $viasMesaSingle;
        private $noveLinhasDepois;
        private $numeroColunas;
        private $aquisicao;
        private $expiracao;
		private $endereco;
		private $numero;
		private $bairro;
		private $cidade;
		private $estado;
        
		function __construct($id, $nomeCliente, $facebook, $site, $viasBalcao, $viasEntrega, $viasMesa, $viasMesaSingle, $noveLinhasDepois, $numeroColunas, $aquisicao, $expiracao, $endereco, $numero, $bairro, $cidade, $estado){
            
            $this->id               = $id;
            $this->nomeCliente      = $nomeCliente;
            $this->facebook         = $facebook;
            $this->site             = $site;
            $this->viasBalcao       = $viasBalcao;
            $this->viasEntrega      = $viasEntrega;
            $this->viasMesa         = $viasMesa;
            $this->viasMesaSingle   = $viasMesaSingle;
            $this->noveLinhasDepois = $noveLinhasDepois;
            $this->numeroColunas    = $numeroColunas;
            $this->aquisicao        = $aquisicao;
            $this->expiracao        = $expiracao;
			$this->endereco         = $endereco;
			$this->numero           = $numero;
			$this->bairro           = $bairro;
			$this->cidade           = $cidade;
			$this->estado           = $estado;
        }
        
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getNomeCliente(){
            return $this->nomeCliente;
        }
        
        public function setNomeCliente($nomeCliente){
            $this->nomeCliente = $nomeCliente;
        }
        
        public function getFacebook(){
            return $this->facebook;
        }
        
        public function setFacebook($facebook){
            $this->facebook = $facebook;
        }
        
        public function getSite(){
            return $this->site;
        }
        
        public function setSite($site){
            $this->site = $site;
        }
        
        public function getViasBalcao(){
            return $this->viasBalcao;
        }
        
        public function setViasBalcao($viasBalcao){
            $this->viasBalcao = $viasBalcao;
        }
        
        public function getViasEntrega(){
            return $this->viasEntrega;
        }
        
        public function setViasEntrega($viasEntrega){
            $this->viasEntrega = $viasEntrega;
        }
        
        public function getViasMesa(){
            return $this->viasMesa;
        }
        
        public function setViasMesa($viasMesa){
            $this->viasMesa = $viasMesa;
        }
        
        public function getViasMesaSingle(){
            return $this->viasMesaSingle;
        }
        
        public function setViasMesaSingle($viasMesaSingle){
            $this->viasMesaSingle = $viasMesaSingle;
        }
        
        public function getNoveLinhasDepois(){
            return $this->noveLinhasDepois;
        }
        
        public function setNoveLinhasDepois($noveLinhasDepois){
            $this->noveLinhasDepois = $noveLinhasDepois;
        }
        
        public function getNumeroColunas(){
            return $this->numeroColunas;
        }
        
        public function setNumeroColunas($numeroColunas){
            $this->numeroColunas = $numeroColunas;
        }
        
        public function getAquisicao(){
            return $this->aquisicao;
        }
        
        public function setAquisicao($aquisicao){
            $this->aquisicao = $aquisicao;
        }
        
        public function getExpiracao(){
            return $this->expiracao;
        }
        
        public function setExpiracao($expiracao){
            $this->expiracao = $expiracao;
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
    }
    
?>