<?php

    include_once '../../model/CategoriaFuncionario.php';
    
    class categoriaFuncionarioDAO{
        
        private $conn;
        
        function __construct($conn){
            
            $this->conn = $conn;
        }
        
        function listarCategoriasFuncionario(){
            
            $query  = "select * from categoria_funcionario";
            $result = $this->conn->query($query);
            
            $categoriasFuncionario = array();
            
            while ($categoriaFuncionario = $result->fetch_array()) {
                
                $categoriaFuncionario2 = new CategoriaFuncionario(
                    $categoriaFuncionario['id'], 
                    $categoriaFuncionario['nome_categoria']); 
                    
                $categoriasFuncionario[] = $categoriaFuncionario2;
            }
            
            $this->conn->close();
            return $categoriasFuncionario;
        }
        
        function buscarCategoriaFuncionario($id){
            
            //prepare
            if (!($stmt = $this->conn->prepare("select * from categoria_funcionario where id=?"))) {
                
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
            $categoriaFuncionario = $result->fetch_assoc();
                
            $categoriaFuncionario2 = new categoriaFuncionario(
                $categoriaFuncionario['id'], 
                $categoriaFuncionario['nome_categoria']);
                
            //close
            $stmt->close();
            $this->conn->close();
            return $categoriaFuncionario2;
        } 
    }
?>