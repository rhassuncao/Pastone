<?php
    
    class Funcionario{
        
        private $id;
        private $categoriaFuncionario;
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
        private $RG;
        private $CPF;
        private $dataNascimento;
        private $CTPS;
        private $salario;
        private $valeTransporte;
        private $valeRefeicao;
        private $ativo;
        private $cadastro;
        private $email;
        private $senha;
        
        function __construct($id, $categoriaFuncionario, $nome, $telefone1, $telefone2, $telefone3, $CEP, $endereco, $numero, $complemento, $pontoReferencia, $bairro, $cidade, $estado,  $RG, $CPF, $dataNascimento, $CTPS, $salario, $valeTransporte, $valeRefeicao, $ativo, $cadastro, $email, $senha){
            
            $this->id                   = $id;
            $this->categoriaFuncionario = $categoriaFuncionario;
            $this->nome                 = $nome;
            $this->telefone1            = $telefone1;
            $this->telefone2            = $telefone2;
            $this->telefone3            = $telefone3;
            $this->CEP                  = $CEP;
            $this->endereco             = $endereco;
            $this->numero               = $numero;
            $this->complemento          = $complemento;
            $this->pontoReferencia      = $pontoReferencia;
            $this->bairro               = $bairro;
            $this->cidade               = $cidade;
            $this->estado               = $estado;
            $this->RG                   = $RG;
            $this->CPF                  = $CPF;
            $this->dataNascimento       = $dataNascimento;
            $this->CTPS                 = $CTPS;
            $this->salario              = $salario;
            $this->valeTransporte       = $valeTransporte;
            $this->valeRefeicao         = $valeRefeicao;
            $this->ativo                = $ativo;
            $this->cadastro             = $cadastro;
            $this->email                = $email;
            $this->senha                = $senha;
        }
        
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getCategoriaFuncionario(){
            return $this->categoriaFuncionario;
        }
        
        public function setCategoriaFuncionario($categoriaFuncionario){
            $this->categoriaFuncionario = $categoriaFuncionario;
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
        
        public function getRG(){
            return $this->RG;
        }
        
        public function setRG($RG){
            $this->RG = $RG;
        }
        
        public function getCPF(){
            return $this->CPF;
        }
        
        public function setCPF($CPF){
            $this->CPF = $CPF;
        }
        
        public function getDataNascimento(){
            return $this->dataNascimento;
        }
        
        public function setDataNascimento($dataNascimento){
            $this->dataNascimento = $dataNascimento;
        }
        
        public function getCTPS(){
            return $this->CTPS;
        }
        
        public function setCTPS($CTPS){
            $this->CTPS = $CTPS;
        }
        
        public function getSalario(){
            return $this->salario;
        }
        
        public function setSalario($salario){
            $this->salario = $salario;
        }
        
        public function getValeTransporte(){
            return $this->valeTransporte;
        }
        
        public function setValeTransporte($valeTransporte){
            $this->valeTransporte = $valeTransporte;
        }
        
        public function getValeRefeicao(){
            return $this->valeRefeicao;
        }
        
        public function setValeRefeicao($valeRefeicao){
            $this->valeRefeicao = $valeRefeicao;
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
        
        public function getEmail(){
            return $this->email;
        }
        
        public function setEmail($email){
            $this->email = $email;
        }
        
        public function getSenha(){
            return $this->senha;
        }
        
        public function setSenha($senha){
            $this->senha = $senha;
        }
    }
    
?>