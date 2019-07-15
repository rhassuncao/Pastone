<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/categoriaFuncionarioDAO.php';
    
    function imprimeCategoriasFuncionarioSelect($select){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO                  = new categoriaFuncionarioDAO($conn);
        $categoriasFuncionario = $CDAO->listarCategoriasFuncionario();
        
        $output = "";
        
        if(isset($categoriasFuncionario)){
            
            foreach($categoriasFuncionario as $c) {
                
                $output .= "<option value='".$c->getId()."' ";
                
                if($c->getId()==$select){
                    
                    $output .= "selected='selected'";
                }
                    
                $output .= " >".$c->getNome()."</option>";
            }
        }
        
        echo $output;
    }
    
?>