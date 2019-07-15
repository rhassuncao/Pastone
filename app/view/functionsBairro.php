<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/bairroDAO.php';
    include_once '../functionsTratamentoString.php';
    
    function imprimeBairros(){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO    = new bairroDAO($conn);
        $bairros = $CDAO->listarBairros();
        
        $output = "";
        
        if(isset($bairros)){
            
            $cont = 0;
            
            foreach($bairros as $b) {
                
                $class = ($cont%2==0)?"even gradeC":"odd gradeA";
                
                $output .= "<tr class='$class'>
                                <td><a href='cadastro-bairro.php?id=".$b->getId()."'>".$b->getId()."</a></td>
                                <td>".$b->getNome()."</td>
                                <td>".valorMoedaVirgula($b->getTaxaEntrega())."</td>
                            </tr>";
                
                $cont++;
            }
        }
        
        echo $output;
    }
    
    function imprimeBairrosSelect($select){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO    = new bairroDAO($conn);
        $bairros = $CDAO->listarBairros();
        
        $output = "";
        
        if(isset($bairros)){
            
            foreach($bairros as $b) {
                
                $output .= "<option value='".$b->getId()."' ";
                
                if($b->getId()==$select){
                    $output .= "selected='selected'";
                }
                
                $output .= " >".$b->getNome()."</option>";
            }
        }
        
        echo $output;
    }
    
    function mostrarBairro($id){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO   = new bairroDAO($conn);
        $bairro = $CDAO->buscarBairro($id);
        
        $ativo   = '';
        $inativo = '';
        
        echo "<form role='form' method='post' action='atualizaBairro.php'>
            <div class='form-group'>
                <div class='row'>
                    <div style='text-align: right;' class='col-lg-12'>
                        <label>Campos obrigatórios possuem (*)</label>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-4'>
                    <div class='form-group'>
                        <label>ID</label>
                        <input class='form-control' name='id' value='".$bairro->getId()."'  readonly='readonly'>
                    </div>
                </div>
                <div class='col-lg-8'>
                    <div class='form-group'>
                        <label>Nome*</label>
                        <input maxlength='50' required class='form-control' name='nome' value='".$bairro->getNome()."'>
                    </div>
                </div>
                <div class='col-lg-12'>
                    <div class='form-group'>
                        <label>Taxa de Entrega*</label>
                        <input required type='number' step='0.01' class='form-control' name='taxaEntrega' value='".$bairro->getTaxaEntrega()."'>
                    </div>
                </div>
            </div>
            <div class='row text-center'>
                <div class='col-lg-12'>
                    <button title='Salvar' type='submit' class='btn btn-success btn-circle btn-lg'><i class='fa fa-save'></i></button>
                    <a href='bairros.php'>
                        <button title='Cancelar' type='button' class='btn btn-danger btn-circle btn-lg'><i class='fa fa-times'></i></button>
                    </a>
                </div>
            </div>
        </form>";
    }
    
?>