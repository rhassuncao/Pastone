<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/clienteDAO.php';
    include_once '../functionsTratamentoString.php';
    include_once '../../model/DAO/bairroDAO.php';
    include_once '../functionsBairro.php';
    include_once '../../model/DAO/estadoDAO.php';
    include_once '../functionsEstado.php';
    
    function imprimeClientes(){
     
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO     = new clienteDAO($conn);
        $clientes = $CDAO->listarClientes();
        
        $output = "";
        
        if(isset($clientes)){
            
            $cont = 0;
            
            foreach($clientes as $c) {
                
                $class = ($cont%2==0)?"even gradeC":"odd gradeA";
                
                $output .= "<tr class='".$class."'>
                            <td><a href='cadastro-clientes.php?id=".$c->getId()."'>".$c->getId()."</a></td>
                            <td>".$c->getNome()."</td>";
                
				$output .= "<td data-search='".$c->getTelefone1()."'>".telefoneMask($c->getTelefone1())."</td>
                            <td data-search='".$c->getTelefone2()."'>".telefoneMask($c->getTelefone2())."</td>
                            <td data-search='".$c->getTelefone3()."'>".telefoneMask($c->getTelefone3())."</td>
                            <td data-search='".$c->getCEP()."'>".cepMask($c->getCEP())."</td>
                            <td>".$c->getEndereco()."</td>
                            <td>".$c->getNumero()."</td>
                            <td>".$c->getComplemento()."</td>
                            <td>".$c->getPontoReferencia()."</td>";
                            
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $CDAO   = new bairroDAO($conn);
                $bairro = $CDAO->buscarBairro($c->getBairro());
                
                $output .= "<td><a href='cadastro-bairro.php?id=".$bairro->getId()."'>".$bairro->getNome()."</a></td>" ;
                
                $output .= "<td>".$c->getCidade()."</td>";
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $EDAO   = new estadoDAO($conn);
                $estado = $EDAO->buscarEstado($c->getEstado());
                
                $output .= "<td>".$estado->getNome()."</td>
                            <td>".(($c->getAtivo()==1)?'Ativo':'Bloqueado')."</td>
							<td>".$c->getObservacao()."</td>
                        </tr>";
                
                $cont++;
            }
        }
        
        echo $output;
    }
    
    function mostrarCliente($numero){
              
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO    = new clienteDAO($conn);
        $cliente = $CDAO->buscarCliente($numero);
        
        $ativo   = '';
        $inativo = '';
        
        if($cliente->getAtivo()==1){
            
            $ativo = 'checked';
            
        } else {
            
            $inativo = 'checked';
        }
        
        echo "
            <form method='post' action='atualizaCliente.php'> 
                <div class='form-group'>
                    <div class='row'>
                        <div class='col-lg-6'>
                            <label>Situação</label>
                            <label class='radio-inline'>
                                <input type='radio' ".$ativo." name='ativo' id='optionsRadiosInline1' value='1' checked>Ativo
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
                    <div class='col-lg-4'>
                        <div class='form-group'>
                            <label>Número</label>
                            <input class='form-control' name='id' value='".$cliente->getId()."'  readonly='readonly'>
                        </div>
                    </div>
                    <div class='col-lg-8'>
                        <div class='form-group'>
                            <label>Nome*</label>
                            <input required maxlength='50' class='form-control' name='nome' value='".$cliente->getNome()."'>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-lg-4'>
                        <div class='form-group'>
                            <label>Telefone 1</label>
                            <input required maxlength='12' class='form-control only_numbers' name='telefone1' value='".$cliente->getTelefone1()."'>
                        </div>
                    </div>
                    <div class='col-lg-4'>
                        <div class='form-group'>
                            <label>Telefone 2</label>
                            <input maxlength='12' class='form-control only_numbers' name='telefone2' value='".$cliente->getTelefone2()."'>
                        </div>
                    </div>
                    <div class='col-lg-4'>
                        <div class='form-group'>
                            <label>Telefone 3</label>
                            <input maxlength='12' class='form-control only_numbers' name='telefone3' value='".$cliente->getTelefone3()."'>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-lg-3'>
                        <div class='form-group'>
                            <label>CEP</label>
                            <input id='cep' maxlength='8' class='form-control only_numbers' name='cep' value='".$cliente->getCEP()."'>
                        </div>
                    </div>
                    <div class='col-lg-1 text-center'>
                        <button readonly='readonly' id='button_buscar_cep' type='button' class='custom-margin-top btn btn-primary btn-circle' title='Buscar'><i class='fa fa-search'></i></button>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-lg-10'>
                        <div class='form-group'>
                            <label>Endereço*</label>
                            <input id='endereco' maxlength='30' required class='form-control' name='endereco' value='".$cliente->getEndereco()."'>
                        </div>
                    </div>
                <div class='col-lg-2'>
                    <div class='form-group'>
                        <label>Número*</label>
                        <input maxlength='6' required class='form-control' name='numero' value='".$cliente->getNumero()."'>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-4'>
                    <div class='form-group'>
                        <label>Complemento</label>
                        <input id='complemento' maxlength='40' class='form-control' name='complemento' value='".$cliente->getComplemento()."'>
                    </div>
                </div>
                <div class='col-lg-8'>
                    <div class='form-group'>
                        <label>Ponto de Referência</label>
                        <input maxlength='30' class='form-control' name='pontoReferencia' value='".$cliente->getPontoReferencia()."'>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-lg-4'>
                    <div class='form-group'>
                        <label>Bairro*</label>
                        <select id='bairro' required oninvalid=\"this.setCustomValidity('Cadastre um bairro antes de cadastrar um produto! Clique na opção Bairros, em seguida no botão Novo e cadastre um bairro')\" name='bairro' class='form-control'>";
                        
                        imprimeBairrosSelect($cliente->getBairro());
                        
                        echo "</select>
                    </div>
                </div>
                <div class='col-lg-4'>
                    <div class='form-group'>
                        <label>Cidade*</label>
                        <input id='cidade' maxlength='20' required class='form-control' name='cidade' value='".$cliente->getCidade()."'>
                    </div>
                </div>
                <div class='col-lg-4'>
                    <div class='form-group'>
                        <label>Estado*</label>
                        <select id='estado' name='estado' class='form-control'>";
                            
                            imprimeEstadosSelect($cliente->getEstado());
                            
                    echo "</select>
                    </div>
                </div>
            </div>
			<div class='row'>
                <div class='col-lg-12'>
                    <div class='form-group'>
                        <label>Observação</label>
                        <textarea class='form-control' maxlength='255' rows='3' name='observacao'>".$cliente->getObservacao()."</textarea>
                    </div>
                </div>
            </div>
            <div class='row text-center'>
                <div class='col-lg-12'>
                    <button title='Salvar' type='submit' class='btn btn-success btn-circle btn-lg'><i class='fa fa-save'></i></button>
                    <a href='clientes.php'>
                        <button title='Cancelar' type='button' class='btn btn-danger btn-circle btn-lg'><i class='fa fa-times'></i></button>
                    </a>
                </div>
            </div>
        </form>";
    }
    
?>