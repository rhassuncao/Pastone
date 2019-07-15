<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/funcionarioDAO.php';
    include_once '../functionsPedidoEntrega.php';
    include_once '../functionsTratamentoString.php';
    include_once '../../model/DAO/categoriaFuncionarioDAO.php';
    include_once '../functionsCategoriaFuncionario.php';
    include_once '../functionsEstado.php';
    include_once '../../model/DAO/estadoDAO.php';
    
    function listarEntregadoresTab($entregadorId){
        
		if($entregadorId!=NULL){
			
			$cf   = new connectionFactory();
			$conn = $cf->getConnection();
			
			$FDAO       = new funcionarioDAO($conn);
			$entregador = $FDAO->buscarFuncionario($entregadorId);
			
			$output = "<ul class='nav nav-tabs'>";
			
			$output .= "<li class='active'><a href='#".$entregador->getId()."' data-toggle='tab'>".$entregador->getNome()."</a></li>";
			
			$output .= "</ul>";
			
		} else {
			
			$cf   = new connectionFactory();
			$conn = $cf->getConnection();
			
			$FDAO         = new funcionarioDAO($conn);
			$entregadores = $FDAO->listarEntregadores();
			
			$output = "";
			
			$first = " class='active'";
			
			if(isset($entregadores) && count($entregadores) != 0){
				
				$output = "<ul class='nav nav-tabs'>";
				$cont   = 0;
				
				foreach($entregadores as $e) {
					
					//Para listar apenas as mesas ativas
					if($e->getAtivo()==1){
						
						$output .= "<li".$first."><a href='#".$e->getId()."' data-toggle='tab'>".$e->getNome()."</a></li>";
						
						$first = "";
						$cont++;
					}
				}
				
				if($cont == 0){
					
					$output = "<div style='margin: 15px;' class='customBordered'>
				<p>Não existem Entregadores ativos, cadastre entregadores ou ative-os utilizando a opção <a href='funcionarios.php'>Funcionários</a> do menu lateral</p>
				</div>";
					
				} else {
					
					$output .= "</ul>";
				}
				
			} else {
				
				$output = "<div style='margin: 15px;' class='customBordered'>
					<p>Não existem Entregadores cadastrados, cadastre entregadores ou ative-os utilizando a opção <a href='funcionarios.php'>Funcionários</a> do menu lateral</p>
					</div>";
			}
			
		}
        
        echo $output;
    }
    
    function imprimePedidosEntregadoresTab($entregadorId){
        
		if($entregadorId!=NULL){
			
			$cf   = new connectionFactory();
			$conn = $cf->getConnection();
			
			$FDAO       = new funcionarioDAO($conn);
			$entregador = $FDAO->buscarFuncionario($entregadorId);
			
			$output = "<div class='tab-content'>";
			
			$output .= "<div class='tab-pane fade in active id='".$entregador->getId()."'>
                        <div class='row'><div style='margin-bottom: 15px;'></div>" ;
			
			$output .= imprimePedidosEntregadorPanel($entregador->getId());
			
			$cf   = new connectionFactory();
			$conn = $cf->getConnection();
			
			$FDAO2 = new funcionarioDAO($conn);
			$total = $FDAO2->calculaTotalEntregador($entregador->getId());
			
			$total = valorMoedaVirgula($total);
			
			$output .= "</div>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label>Total</label>
                                    <input value='".$total."' class='form-control' name='total' readonly='readonly'>
                                </div>
                            </div>
                        </div>
                        <div class='row text-center'>
                            <div class='col-lg-12'>
                                <button disabled type='button' id='".$entregador->getId()."' class='btn btn-success zerar_entregas btn-circle btn-lg' title='Zerar Entregas'><i class='fa fa-check'></i></button>
                            </div>
                        </div>
                    </div>";
			
		} else {
			
			$cf   = new connectionFactory();
			$conn = $cf->getConnection();
			
			$FDAO         = new funcionarioDAO($conn);
			$entregadores = $FDAO->listarEntregadores();
			
			$output = "<div class='tab-content'>";
			
			if(isset($entregadores)){
				
				$first = "active";
				
				foreach($entregadores as $e) {
					
					//so preenche a tab se o entregador estiver ativo
					if($e->getAtivo()==1){
						
						$output .= "<div class='tab-pane fade in ".$first."' id='".$e->getId()."'>
                        <div class='row'><div style='margin-bottom: 15px;'></div>" ;
						
						$output .= imprimePedidosEntregadorPanel($e->getId());
						
						$cf   = new connectionFactory();
						$conn = $cf->getConnection();
						
						$FDAO2 = new funcionarioDAO($conn);
						$total = $FDAO2->calculaTotalEntregador($e->getId());
						
						$total = valorMoedaVirgula($total);
						
						$output .= "</div>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label>Total</label>
                                    <input value='".$total."' class='form-control' name='total' readonly='readonly'>
                                </div>
                            </div>
                        </div>
                        <div class='row text-center'>
                            <div class='col-lg-12'>
                                <button type='button' id='".$e->getId()."' class='btn btn-success zerar_entregas btn-circle btn-lg' title='Zerar Entregas'><i class='fa fa-check'></i></button>
                            </div>
                        </div>
                    </div>";
						
						$first = "";
					}
				}
			}
			
			$output .= "</div>";
			
		}
		
        echo $output;
    }
    
    function imprimeEntregadoresSelect($select){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $FDAO         = new funcionarioDAO($conn);
        $entregadores = $FDAO->listarEntregadores();
        
        $output = "";
        
        if(isset($entregadores)){
            
            foreach($entregadores as $e) {
                
                //Lista apenas entregadores ativos
                if($e->getAtivo()==1){
                    
                    $output .= "<option value='".$e->getId()."' ";
                    
                    if($e->getId()===$select){
                        
                        $output .= "selected='selected'";
                    }
                    
                    $output .= " >".$e->getNome()."</option>";
                }
            }
        }
        
        echo $output;
    }
    
    function imprimeFuncionarios(){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO         = new funcionarioDAO($conn);
        $funcionarios = $CDAO->listarFuncionarios();
        
        $output = "";
        
        if(isset($funcionarios)){
            
            $cont = 0;
            
            foreach($funcionarios as $f) {
                
                $class = ($cont%2==0)?"even gradeC":"odd gradeA";
                $output .= "<tr class='$class'>
                                <td><a href='cadastro-funcionario.php?id=".$f->getId()."'>".$f->getId()."</a></td>
                                <td>".$f->getNome()."</td>";
                                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $CDAO      = new categoriaFuncionarioDAO($conn);
                $categoria = $CDAO->buscarCategoriaFuncionario($f->getCategoriaFuncionario());
                
                $output .= "<td>".$categoria->getNome()."</td>" ;
                
				$output .= "    <td data-search='".$f->getTelefone1()."'>".telefoneMask($f->getTelefone1())."</td>
                                <td data-search='".$f->getTelefone2()."'>".telefoneMask($f->getTelefone2())."</td>
                                <td data-search='".$f->getTelefone3()."'>".telefoneMask($f->getTelefone3())."</td>
                                <td data-search='".$f->getCEP()."'>".cepMask($f->getCEP())."</td>
                                <td>".$f->getEndereco()."</td>
                                <td>".$f->getNumero()."</td>
                                <td>".$f->getComplemento()."</td>
                                <td>".$f->getPontoReferencia()."</td>
                                <td>".$f->getBairro()."</td>
                                <td>".$f->getCidade()."</td>";
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                    
                $EDAO   = new estadoDAO($conn);
                $estado = $EDAO->buscarEstado($f->getEstado());
                
                $output .=     "<td>".$estado->getNome()."</td>
                                <td>".$f->getRG()."</td>
                                <td>".$f->getCPF()."</td>
                                <td>".date('d/m/Y',  strtotime($f->getDataNascimento()))."</td>
                                <td>".$f->getCTPS()."</td>";
                
                $output .= "    <td>".valorMoedaVirgula($f->getSalario())."</td>
                                <td>".valorMoedaVirgula($f->getValeTransporte())."</td>
                                <td>".valorMoedaVirgula($f->getValeRefeicao())."</td>
                                <td  class='center'>".($f->getAtivo()==1?"Ativo":"Bloqueado")."</td>";
                
                $data = utf8_encode(date('j \d\\e F \d\\e Y, \a\s g:i a', strtotime($f->getCadastro())));
                
                $output .= "<td>".$data."</td>
                                <td>".$f->getEmail()."</td>
                            </tr>";
                    
                $cont++;
            }
        }
        
        echo $output;
    }
    
    function mostrarFuncionario($id){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO        = new funcionarioDAO($conn);
        $funcionario = $CDAO->buscarFuncionario($id);
        
        $ativo   = '';
        $inativo = '';
        
        if($funcionario->getAtivo()==1){
            
            $ativo = 'checked';
            
        } else {
            
            $inativo = 'checked';
        }
        
        echo "<form role='form' method='post' action='atualizaFuncionario.php'>
                </div>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        Identificação
                    </div>
                    <div class='panel-body'>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <label>Situação</label>
                                        <label class='radio-inline'>
                                            <input type='radio' name='ativo' ".$ativo." id='optionsRadiosInline1' value='1' checked>Ativo
                                        </label>
                                        <label class='radio-inline'>
                                            <input type='radio' name='ativo' ".$inativo." id='optionsRadiosInline2' value='0'>Bloqueado
                                        </label>
                                    </div>
                                    <div style='text-align: right;' class='col-lg-6'>
                                        <label>Campos obrigatórios possuem (*)</label>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-lg-2'>
                                        <div class='form-group'>
                                            <label>ID</label>
                                            <input class='form-control' name='id' value='".$funcionario->getId()."'  readonly='readonly'>
                                        </div>
                                    </div>
                                    <div class='col-lg-6'>
                                        <div class='form-group'>
                                            <label>Nome*</label>
                                            <input name='nome' maxlength='50' required value='".$funcionario->getNome()."' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='col-lg-4'>
                                        <div class='form-group'>
                                            <label>Função*</label>
                                            <select name='categoriaFuncionario' class='form-control'> ";
                                            
                                            imprimeCategoriasFuncionarioSelect($funcionario->getCategoriaFuncionario());
                                            
                                            echo " </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        Dados de Contato
                    </div>
                    <div class='panel-body'>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='row'>
                                    <div class='col-lg-4'>
                                        <div class='form-group'>
                                            <label>Telefone 1*</label>
                                            <input maxlength='12' required name='telefone1' value='".$funcionario->getTelefone1()."' class='form-control only_numbers'>
                                        </div>
                                    </div>
                                    <div class='col-lg-4'>
                                        <div class='form-group'>
                                            <label>Telefone 2</label>
                                            <input maxlength='12' name='telefone2' value='".$funcionario->getTelefone2()."' class='form-control only_numbers'>
                                        </div>
                                    </div>
                                <div class='col-lg-4'>
                                    <div class='form-group'>
                                        <label>Telefone 3</label>
                                        <input maxlength='12' name='telefone3' value='".$funcionario->getTelefone3()."' class='form-control only_numbers'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    Dados de Enredeço
                </div>
                <div class='panel-body'>
                    <div class='row'>
                        <div class='col-lg-12'>
                            <div class='row'>
                                <div class='col-lg-3'>
                                    <div class='form-group'>
                                        <label>CEP</label>
                                        <input id='cep' maxlength='8' name='cep' value='".$funcionario->getCEP()."' class='form-control' oninput='this.value = this.value.replace(/[^0-9.]/g, \"\"); this.value = this.value.replace(/(\..*)\./g, \"$1\");'> 
                                    </div>
                                </div>
                                <div class='col-lg-1 text-center'>
                                    <button readonly='readonly' id='button_buscar_cep' type='button' class='custom-margin-top btn btn-primary btn-circle' title='Buscar'><i class='fa fa-search'></i></button>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-lg-10'>
                                    <div class='form-group'>
                                        <label>Endereço</label>
                                        <input id='endereco' maxlength='30' required name='endereco' value='".$funcionario->getEndereco()."' class='form-control'>
                                    </div>
                                </div>
                                <div class='col-lg-2'>
                                    <div class='form-group'>
                                        <label>Número</label>
                                        <input maxlength='8' required name='numero' value='".$funcionario->getNumero()."' class='form-control'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-lg-4'>
                                    <div class='form-group'>
                                        <label>Complemento</label>
                                        <input maxlength='40' name='complemento' value='".$funcionario->getComplemento()."' class='form-control'>
                                    </div>
                                </div>
                                <div class='col-lg-8'>
                                    <div class='form-group'>
                                        <label>Ponto de Referência</label>
                                        <input maxlength='50' name='pontoReferencia' value='".$funcionario->getPontoReferencia()."' class='form-control'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-lg-4'>
                                    <div class='form-group'>
                                        <label>Bairro</label>
                                        <input id='bairro_field' maxlength='20' required name='bairro' value='".$funcionario->getBairro()."' class='form-control'>
                                    </div>
                                </div>
                                <div class='col-lg-4'>
                                    <div class='form-group'>
                                        <label>Cidade</label>
                                        <input id='cidade' maxlength='20' required name='cidade' value='".$funcionario->getCidade()."' class='form-control'>
                                    </div>
                                </div>
                                <div class='col-lg-4'>
                                    <div class='form-group'>
                                        <label>Estado</label>
                                        <select id='estado' required name='estado' class='form-control'>";
                                        
                                        imprimeEstadosSelect($funcionario->getEstado());  
                                        
                                        echo "</select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        Documentos
                    </div>
                    <div class='panel-body'>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='row'>
                                    <div class='col-lg-3'>
                                        <div class='form-group'>
                                            <label>RG - Apenas números</label>
                                            <input maxlength='10' name='rg' value='".$funcionario->getRG()."' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='col-lg-3'>
                                        <div class='form-group'>
                                            <label>CPF - Apenas números</label>
                                            <input maxlength='12' name='cpf' value='".$funcionario->getCPF()."' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='col-lg-3'>
                                        <div class='form-group'>
                                            <label>Data Nascimento</label>
                                            <input name='dataNascimento' type='date' value='".$funcionario->getDataNascimento()."' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='col-lg-3'>
                                        <div class='form-group'>
                                            <label>CTPS - Apenas números</label>
                                            <input maxlength='20' name='ctps' value='".$funcionario->getCTPS()."' class='form-control'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        Rendimentos
                    </div>
                    <div class='panel-body'>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='row'>
                                    <div class='col-lg-4'>
                                        <div class='form-group'>
                                            <label>Salário</label>
                                            <input maxlength='8' type='number' step='0.01' name='salario'  value='".$funcionario->getSalario()."' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='col-lg-4'>
                                        <div class='form-group'>
                                            <label>Vale Transporte</label>
                                            <input maxlength='6' type='number' step='0.01' name='valeTransporte' value='".$funcionario->getValeTransporte()."' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='col-lg-4'>
                                        <div class='form-group'>
                                            <label>Vale Refeição</label>
                                            <input maxlength='6' type='number' step='0.01' name='valeRefeicao' value='".$funcionario->getValeRefeicao()."' class='form-control'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        Dados do Sistema
                    </div>
                    <div class='panel-body'>
                        <div class='row'>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Email</label>
                                    <input name='email' type='email' maxlength='30' value='".$funcionario->getEmail()."' class='form-control'>
                                </div>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Trocar Senha</label>
                                    <input maxlength='20' name='senha' type='password' class='form-control'>
                                </div>
                            </div>
                        </div>
                        <div class='row text-center'>
                            <div class='col-lg-12'>
                                <button title='Salvar' type='submit' class='btn btn-success btn-circle btn-lg'><i class='fa fa-save'></i></button>
                                <a href='funcionarios.php'>
                                    <button title='Cancelar' type='button' class='btn btn-danger btn-circle btn-lg'><i class='fa fa-times'></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>";
    }
    
?>