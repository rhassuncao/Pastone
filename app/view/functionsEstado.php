<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/estadoDAO.php';
    
    function imprimeEstadosSelect($select){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $EDAO    = new estadoDAO($conn);
        $estados = $EDAO->listarEstados();
        
        $output = "";
        
        if(isset($estados)){
            
            foreach($estados as $e) {
                
                $output .= "<option value='".$e->getId()."'";
                
                if($e->getId()==$select){
                    $output .= " selected='selected'";
                }
                
                $output .= ">".$e->getNome()."</option>";
            }
        }
        
        echo $output;
    }
    
?>