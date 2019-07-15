<?php
    
    include_once '../../model/Produto.php';
    
    class produtoDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        //***May have injection***
        function listarProdutosCategoria($categoriaId){
            
            $query = "select * from produto where categoria_id=".$categoriaId;
            $result = $this->conn->query($query);
            
            $produtos = array();
            
            while ($produto = $result->fetch_array()) {
                
                $produto2 = new Produto(
                    $produto['id'], 
                    $produto['nome'],
                    $produto['preco'],
                    $produto['descricao'], 
                    $produto['ativo'],
                    $produto['categoria_id']);
                
                $produtos[] = $produto2;
            }
            
            $this->conn->close();
            return $produtos;
        }
        
        function listarProdutos(){
            
            $query = "select * from produto";
            $result = $this->conn->query($query);
            
            $produtos = array();
            
            while ($produto = $result->fetch_array()) {
                
                $produto2 = new Produto(
                    $produto['id'], 
                    $produto['nome'],
                    $produto['preco'],
                    $produto['descricao'], 
                    $produto['ativo'],
                    $produto['categoria_id']);
                
                $produtos[] = $produto2;
            }
            
            $this->conn->close();
            return $produtos;
        }
        
        function buscarProduto($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from produto where id=?"))) {
                
                return "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
            if (!$stmt->bind_param("i", $id)) {
                
                return "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                return "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            $result = $stmt->get_result();
            $produto = $result->fetch_assoc();
            
            $produto2 = new Produto(
                $produto['id'], 
                $produto['nome'],
                $produto['preco'],
                $produto['descricao'], 
                $produto['ativo'],
                $produto['categoria_id']);
            
            //close
            $stmt->close();
            $this->conn->close();
            return $produto2;
        } 
        
        function atualizarProduto($produto){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("UPDATE produto SET nome=?, preco=?, descricao=?, ativo=?, categoria_id=? where id=?"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
			$nome      = $produto->getNome(); 
			$preco     = $produto->getPreco(); 
			$descricao  = $produto->getDescricao();
			$ativo     = $produto->getAtivo();
			$categoria = $produto->getCategoria();
			$id        = $produto->getId();
			
            if (!$stmt->bind_param("sdsiii", $nome, $preco, $descricao, $ativo, $categoria, $id)) {
                
                $retorno = "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                $retorno = "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //close
            $stmt->close();
            $this->conn->close();
            return $retorno;
        }
        
        function inserirProduto($produto){
                
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("INSERT INTO produto (nome, preco, descricao, ativo, categoria_id) VALUES (?, ?, ?, ?, ?)"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
            
            //bind
			$nome      = $produto->getNome(); 
			$preco     = $produto->getPreco(); 
			$descricao  = $produto->getDescricao();
			$ativo     = $produto->getAtivo();
			$categoria = $produto->getCategoria();
			
			if (!$stmt->bind_param("sdsii", $nome, $preco, $descricao, $ativo, $categoria)) {
                
                $retorno = "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //execute
            if (!$stmt->execute()) {
                
                $retorno = "Execute failed: (".$stmt->errno.")".$stmt->error;
            }
            
            //close
            $stmt->close();
            $this->conn->close();
            return $retorno;
        }
    } 
    
?>