<?php
    
    include '../../model/DAO/mesaDAO.php';
    include '../../controller/connectionFactory.php';
    include_once '../functionsPedidoMesa.php';
    
    function listarMesasTab(){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO  = new mesaDAO($conn);
        $mesas = $CDAO->listarMesas();
        
        $output = "";
        
        $first = " class='active'";
        
        if(isset($mesas) && count($mesas) != 0){
            
            $output = "<ul class='nav nav-tabs'>";
            $cont = 0;
            
            foreach($mesas as $m) {
                
                //Para listar apenas as mesas ativas
                if($m->getAtivo()==1){
                    
                    $output .= "<li".$first."><a href='#tab".$m->getId()."' data-toggle='tab'>".$m->getNome()."</a></li>";
                    
                    $first = "";
                    $cont++;
                }
            }
            
            if($cont == 0){
                
                $output = "<p class='customBordered'>Não existem mesas ativas, crie novas mesas ou ative-as utilizando a opção \"Mesas\" do menu lateral</p>";
                
            } else {
                
                $output .= "</ul>";
            }

        } else {
            
            $output = "<p>Não existem mesas disponíveis, crie as mesas utilizando a opção \"Mesas\" do menu lateral</p>";
        }
        
        echo $output;
    }
    
    function imprimePedidosMesasTab(){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO  = new mesaDAO($conn);
        $mesas = $CDAO->listarMesas();
        
        $output = "<div class='tab-content'>";
        
        $first = " class='active'";
        
        if(isset($mesas)){
            
            $first = "active";
            
            foreach($mesas as $m) {
                
                //so preenche a tab se a mesa estiver ativa
                if($m->getAtivo()==1){
                    
                    $output .= "<div class='tab-pane fade in ".$first."' id='tab".$m->getId()."'>
                    <div class='row'><div style='margin-bottom: 15px;'></div>" ;
                    
                    $output .= imprimePedidosMesasPanel($m->getId());
                    
                    $output .= "</div>
                    <div class='row text-center'>
                        <div class='col-lg-12'>
                            <a href='pedido-mesa.php?mesaId=".$m->getId()."' class='nounderline'>
                                <button title='Adicionar' type='button' class='btn btn-primary btn-circle btn-lg'><i class='fa fa-plus'></i></button>
                            </a>
                            <button type='button' id='".$m->getId()."' class='btn btn-primary btn-circle btn-lg imprimir_mesa' title='Imprimir'><i class='fa fa-print'></i></button>
                            <button type='button' id='".$m->getId()."' class='btn btn-success fechar_mesa btn-circle btn-lg' title='Zerar Mesa'><i class='fa fa-check'></i></button>
                        </div>
                    </div>
                </div>";

                    $first = "";
                }
            }
        }
        
        $output .= "</div>";
        echo $output;
    }
    
    function imprimeMesas(){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO  = new mesaDAO($conn);
        $mesas = $CDAO->listarMesas();
        
        $output = "";
        
        if(isset($mesas)){
            
            $cont = 0;
            
            foreach($mesas as $m) {
                
                $class = ($cont%2==0)?"even gradeC":"odd gradeA";
                
                $output .= "<tr class='$class'>
                            <td><a href='cadastro-mesa.php?id=".$m->getId()."'>".$m->getId()."</a></td>
                            <td>".$m->getNome()."</td>
                            <td>".$m->getDescricao()."</td>
                            <td class='center'>".($m->getAtivo()==1?"Ativo":"Bloqueado")."</td>
                        </tr>";
                
                $cont++;
            }
        }
        
        echo $output;
    }
    
    function mostrarMesa($id){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO = new mesaDAO($conn);
        $mesa = $CDAO->buscarMesa($id);
        
        $ativo = '';
        $inativo = '';
        
        if($mesa->getAtivo()==1){
            
            $ativo = 'checked';
            
        } else {
            
            $inativo = 'checked';
        }
        
        echo "<form method='post' action='atualizaMesa.php'>
                <div class='form-group'>
                    <div class='row'>
                        <div class='col-lg-6'>
                            <label>Situação</label>
                            <label class='radio-inline'>
                                <input type='radio' ".$ativo." name='ativo' id='optionsRadiosInline1' value='1'>Ativo
                            </label>
                            <label class='radio-inline'>
                                <input type='radio' ".$inativo." name='ativo' id='optionsRadiosInline2' value='0'>Bloqueado
                            </label>
                        </div>
                        <div style='text-align: right;' class='col-lg-6'>
                            <label>Campos obrigatórios possuem (*)</label>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>ID</label>
                                    <input class='form-control' name='id' value='".$mesa->getId()."'  readonly='readonly'>
                                </div>
                            </div>
                            <div class='col-lg-8'>
                                <div class='form-group'>
                                    <label>Nome*</label>
                                    <input class='form-control' maxlength='15' required name='nome' value='".$mesa->getNome()."'>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label>Descrição*</label>
                                    <input class='form-control' maxlength='50' required name='descricao' value='".$mesa->getDescricao()."'>
                                </div>
                            </div>
                        </div>
                        <div class='row text-center'>
                            <div class='col-lg-12'>
                                <button title='Salvar' type='submit' class='btn btn-success btn-circle btn-lg'><i class='fa fa-save'></i></button>
                                <a href='mesas.php'>
                                    <button title='Cancelar' type='button' class='btn btn-danger btn-circle btn-lg'><i class='fa fa-times'></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>";
    }
    
?>