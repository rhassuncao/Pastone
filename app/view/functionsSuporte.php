<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/suporteDAO.php';
    include_once '../../model/DAO/funcionarioDAO.php';
    include_once '../../model/DAO/statusPedidoDAO.php';
    
    function imprimeSuportes(){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO     = new suporteDAO($conn);
        $suportes = $CDAO->listarSuportes();
        
        $output = "";
        
        if(isset($suportes)){
            
            $cont = 0;
            
            foreach($suportes as $s) {
                
                $class = ($cont%2==0)?"even gradeC":"odd gradeA";
                
                //alterar o numero do funcionario pelo nome
                //trocar o numero do status pelo nome
                $output .= "<tr class='$class'>
                                    <td>".$s->getId()."</td>
                                    <td>".$s->getDescricao()."</td>
                                    <td>".$s->getData()."</td>";
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $FDAO        = new funcionarioDAO($conn);
                $funcionario = $FDAO->buscarFuncionario($s->getFuncionarioId());
                
                $output .= "<td>".$funcionario->getNome()."</td>
                                    <td>".$s->getResposta()."</td>";
               
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $SDAO   = new statusPedidoDAO($conn);
                $status = $SDAO->buscarStatusPedido($s->getStatusId());
                
                $output .= "<td>".$status->getNome()."</td>
                                </tr>";
                
                $cont++;
            }
        }
        
        echo $output;
    }
    
?>