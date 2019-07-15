<?php
    
    include_once '../../model/CategoriaProduto.php';
    
    class categoriaProdutoDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function listarCategoriasProduto(){
            
            $query  = "select * from categoria_produto";
            $result = $this->conn->query($query);
            
            $categoriasProduto = array();
            
            while ($categoriaProduto = $result->fetch_array()) {
                
                $categoriaProduto2 = new CategoriaProduto(
                    $categoriaProduto['id'], 
                    $categoriaProduto['nome'], 
                    $categoriaProduto['descricao'], 
                    $categoriaProduto['ativo']);
                    
                $categoriasProduto[] = $categoriaProduto2;
            }
            
            $this->conn->close();
            return $categoriasProduto;
        }
        
        //***May have injection***
        function buscarCategoriaProduto($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from categoria_produto where id=?"))) {
                
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
            $categoriaProduto = $result->fetch_assoc();
                
            $categoriaProduto2 = new CategoriaProduto(
                $categoriaProduto['id'], 
                $categoriaProduto['nome'], 
                $categoriaProduto['descricao'], 
                $categoriaProduto['ativo']);
                
            //close
            $stmt->close();
            $this->conn->close();
            return $categoriaProduto2;
        } 
        
        function atualizarCategoriaProduto($categoriaProduto){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("UPDATE categoria_produto SET nome=?, descricao=?, ativo=? where id=?"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
			
			$nome      = $categoriaProduto->getNome(); 
			$descricao = $categoriaProduto->getDescricao(); 
			$ativo     = $categoriaProduto->getAtivo(); 
			$id        = $categoriaProduto->getId();
            
            //bind
            if (!$stmt->bind_param("ssii", $nome, $descricao, $ativo, $id )) {
                
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
        
        function inserirCategoria($categoriaProduto){
            
            $retorno = true;
            
            //prepare
            if (!($stmt = $this->conn->prepare("INSERT INTO categoria_produto (nome, descricao, ativo) 
                        VALUES  (?,?,?)"))) {
                
                $retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
            }
			
			$nome      = $categoriaProduto->getNome(); 
			$descricao = $categoriaProduto->getDescricao(); 
			$ativo     = $categoriaProduto->getAtivo(); 
            
            //bind
            if (!$stmt->bind_param("ssi", $nome, $descricao, $ativo)) {
                
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
