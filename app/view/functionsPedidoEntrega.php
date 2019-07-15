<?php
    
    include_once '../functionsBairro.php';
    include_once '../functionsFuncionario.php';
    include_once '../functionsCategoriaProduto.php';
    include_once '../functionsProduto.php';
    include_once '../functionsTratamentoString.php';
    include_once '../functionsEstado.php';
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/pedidoEntregaDAO.php';
    include_once '../../model/DAO/itemDAO.php';
    include_once '../../model/DAO/clienteDAO.php';
    include_once '../../model/DAO/bairroDAO.php';
    include_once '../../model/DAO/produtoDAO.php';
    include_once '../../model/DAO/pedidoDAO.php';
    include_once '../../model/DAO/funcionarioDAO.php';
    include_once '../../model/DAO/statusPedidoDAO.php';
    
    function imprimePedidosEntregadorPanel($entregadorId){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $PDAO    = new pedidoEntregaDAO($conn);
        $pedidos = $PDAO->listarPedidosEntregador($entregadorId);
        
        $output = "";
        
        if(isset($pedidos)){
            
            foreach($pedidos as $p) {
                
                $output .= "<div class='col-lg-4'>
                        <div class='panel panel-green'>
                            <div class='panel-heading'>
                                Pedido #".$p->getPedidoId()."
                            </div>
                            <div class='panel-body'>";
                
                $output .= "<p class='text-center font-weight-bold'>Cliente</p>";
                
                $output .= "<div class='customBordered'>";
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $IDAO  = new itemDAO($conn);
                $itens = $IDAO->listarItensPedido($p->getPedidoId());
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $CDAO    = new clienteDAO($conn);
                $cliente = $CDAO->buscarCliente($p->getClienteId());
                
                $output .= "<p>Cliente: ".$cliente->getNome()."</p>";
                $output .= "<p>Endereço: ".$cliente->getEndereco()." nº ".$cliente->getNumero()."</p>";
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $BDAO = new bairroDAO($conn);
                $bairro = $BDAO->buscarBairro($cliente->getBairro());
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $EDAO = new estadoDAO($conn);
                $estado = $EDAO->buscarEstado($cliente->getEstado());
                
                $output .= "<p>".$bairro->getNome()." - ".$cliente->getCidade()."/".$estado->getNome()."</p>";
                
                $output .= "</div>";
                
                $output .= "<p class='text-center font-weight-bold'>Pedido</p>";
                
                if(isset($itens)){
                    
                    foreach($itens as $i) {
                        
                        $cf   = new connectionFactory();
                        $conn = $cf->getConnection();
                        
                        $PDAO    = new produtoDAO($conn);
                        $produto = $PDAO->buscarProduto($i->getProdutoId());
                        $output .= "<div class='customBordered'>";
                        $output .= "<p>".$produto->getNome()."</p>";
                        $output .= "<p>Observação: ".$i->getObservacao()."</p>";
                        $output .= "</div>";
                    }
                }
                
                $output .= "</div>
                            <div class='panel-footer'>Taxa Entrega R$ ".
                                valorMoedaVirgula($bairro->getTaxaEntrega())
                            ."</div>
                        </div>
                    </div>";
            }
        }
        
        if($output==""){
            
            $output .= "
                <div style='margin: 15px;' class='customBordered'>
                    <p>Não existem entregas pendentes para este entregador</p>
                </div>";
        }
        
        return $output;
    }
    
    function imprimePedidosEntregaPendente(){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO           = new pedidoEntregaDAO($conn);
        $pedidosEntrega = $CDAO->listarPedidosEntregaPendente();
        
        $output = "";
        
        if(isset($pedidosEntrega)){
            
            $cont = 0;
            
            foreach($pedidosEntrega as $p) {
                
                $class = ($cont%2==0)?"even gradeC":"odd gradeA";
                $output .= "<tr class='$class'>
                                <td><a href='pedido-entrega.php?id=".$p->getId()."'>".$p->getPedidoId()."</a></td>";
                
                //Troca o numero do cliente pelo nome
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $CDAO    = new clienteDAO($conn);
                $cliente = $CDAO->buscarCliente($p->getClienteId());
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $BDAO   = new bairroDAO($conn);
                $bairro = $BDAO->buscarBairro($cliente->getBairro());
                
                $output .= "<td>".$cliente->getNome()."</td>";
                $output .= "<td>".$cliente->getEndereco()." nº "
                        .$cliente->getNumero()." - ";
                
                if($cliente->getComplemento() != ""){
                    
                    $output .= $cliente->getComplemento()." - ";
                }  
                
                $output .= $bairro->getNome()."/"
                        .$cliente->getCidade()."</td>";
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $PPDAO  = new pedidoDAO($conn); 
                $pedido = $PPDAO->buscarPedido($p->getPedidoId());
                
                //Troca o numero do entregador pelo nome
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $FDAO       = new funcionarioDAO($conn);
                $entregador = $FDAO->buscarFuncionario($p->getEntregadorId());
                
                $output .= "<td>".$entregador->getNome()."</td>";
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $P2DAO  = new pedidoDAO($conn);
                $pedido = $P2DAO->buscarPedido($p->getPedidoId());
                
                $pagamento = '';
                
                $pagamento = (($pedido->getFormaPagamentoId()==1)?"Dinheiro":$pagamento);
                $pagamento = (($pedido->getFormaPagamentoId()==2)?"Cartao de credito":$pagamento);
                $pagamento = (($pedido->getFormaPagamentoId()==3)?"Cartao de debito":$pagamento);
                
                $output .= "<td>".$pagamento."</td>";
                                
                $output .= "<td>".valorMoedaVirgula($p->getTroco())."</td>";
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $CDAO = new statusPedidoDAO($conn);
                $statusPedido = $CDAO->buscarStatusPedido($p->getStatusPedidoId());
                
                $output .= "<td>".$statusPedido->getNome()."</td>";
                
                $output .= "<td>".$pedido->getTempoInicio()."</td></tr>";
                
                $cont++;
            }
        }
        
        echo $output;
    }
    
    function mostrarPedidoEntrega($id){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
            
        $PDAO          = new pedidoEntregaDAO($conn);
        $pedidoEntrega = $PDAO->buscarPedidoEntrega($id);
            
        $pendente = '';
        $entregue = '';
            
        if($pedidoEntrega->getStatusPedidoId()==1){
            
            $pendente = 'checked';
            
        } else {
            
            $entregue = 'checked';
        }
            
        echo "<div class='panel panel-default'>
            <div class='panel-heading'>
                Dados do Cliente
            </div>
            <div class='panel-body'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='row'>
                            <div class='col-lg-3'>
                                <div class='form-group'>
                                    <label>Telefone</label>
                                    <input id='telefoneBuscar' disabled class='form-control' name='telefone'>
                                </div>
                            </div>
                            <div class='col-lg-1 custom-margin-top text-center'>
                                <button disabled type='button' id='buscar_telefone' name='buscar_telefone' class='btn btn-primary btn-circle' title='Buscar'><i class='fa fa-search'></i></button>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='row'>
                                <div class='col-lg-6'>
                                    <label>Situação</label>
                                    <label class='radio-inline'>
                                        <input disabled disabled type='radio' ".$pendente." name='ativo' id='ativo' value='1' checked>Pendente
                                    </label>
                                    <label class='radio-inline'>
                                        <input disabled type='radio' ".$entregue." name='ativo' id='inativo' value='2'>Entregue
                                    </label>
                                </div>
                                <div class='col-lg-6 text-right'>
                                    <label>Campos obrigatórios possuem (*)</label>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Número</label>
                                    <input value='".$pedidoEntrega->getClienteId()."' class='form-control' name='id' id='id' readonly='readonly'>
                                </div>
                            </div>";
                            
                            $cf   = new connectionFactory();
                            $conn = $cf->getConnection();
                            
                            $CDAO    = new clienteDAO($conn);
                            $cliente = $CDAO->buscarCliente($pedidoEntrega->getClienteId());
                            
                            echo "<div class='col-lg-8'>
                                <div class='form-group'>
                                    <label>Nome*</label>
                                    <input value='".$cliente->getNome()."' readonly='readonly' required maxlength='50' class='form-control' name='nome' id='nome'>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Telefone 1*</label>
                                    <input value='".$cliente->getTelefone1()."' readonly='readonly' required type='number' maxlength='12' class='form-control' name='telefone1' id='telefone1'>
                                </div>
                            </div>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Telefone 2</label>
                                    <input value='".$cliente->getTelefone2()."' readonly='readonly' required type='number' maxlength='12' class='form-control' name='telefone2' id='telefone2'>
                                </div>
                            </div>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Telefone 3</label>
                                    <input value='".$cliente->getTelefone3()."' readonly='readonly' required type='number' maxlength='12' class='form-control' name='telefone3' id='telefone3'>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-3'>
                                <div class='form-group'>
                                    <label>CEP</label>
                                    <input value='".$cliente->getCEP()."' readonly='readonly' maxlength='8' class='form-control' name='cep' id='cep'>
                                </div>
                            </div>
                            <div class='col-lg-1 text-center'>
                                <button disabled readonly='readonly' id='button_buscar_cep' type='button' class='custom-margin-top btn btn-primary btn-circle' title='Buscar'><i class='fa fa-search'></i></button>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-10'>
                                <div class='form-group'>
                                    <label>Endereço*</label>
                                    <input value='".$cliente->getEndereco()."' readonly='readonly' maxlength='30' required class='form-control' name='endereco' id='endereco'>
                                </div>
                            </div>
                            <div class='col-lg-2'>
                                <div class='form-group'>
                                    <label>Número*</label>
                                    <input value='".$cliente->getNumero()."' readonly='readonly' maxlength='6' required class='form-control' name='numero' id='numero'>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Complemento</label>
                                    <input value='".$cliente->getComplemento()."' readonly='readonly' maxlength='40' class='form-control' name='complemento' id='complemento'>
                                </div>
                            </div>
                            <div class='col-lg-8'>
                                <div class='form-group'>
                                    <label>Ponto de Referência</label>
                                    <input value='".$cliente->getPontoReferencia()."' readonly='readonly' maxlength='30' class='form-control' name='pontoReferencia' id='pontoReferencia'>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Bairro*</label>
                                    <select required disabled oninvalid='this.setCustomValidity('Cadastre um bairro antes de cadastrar um produto! Clique na opção Bairros, em seguida no botão Novo e cadastre um bairro')' name='bairro' class='form-control' id='bairro'>";
                                        
                                        imprimeBairrosSelect($cliente->getBairro());
                                        
                                    echo "</select>
                                </div>
                            </div>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Cidade*</label>
                                    <input value='".$cliente->getCidade()."' readonly='readonly' maxlength='20' required id='cidade' class='form-control' name='cidade'>
                                </div>
                            </div>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Estado*</label>
                                    <select disabled required name='estado' class='form-control' id='estado'>";
                                        
                                        imprimeEstadosSelect($cliente->getEstado());   
                                        
                                    echo "</select>
                                </div>
                            </div>
                        </div>
						<div class='row'>
							<div class='col-lg-12'>
								<div class='form-group'>
									<label>Observação</label>
									<textarea readonly='readonly'  class='form-control' maxlength='255' rows='3' name='observacao'>".$cliente->getObservacao()."</textarea>
								</div>
							</div>
						</div>
                        <div class='row text-center'>
                            <div class='col-lg-12'>
                                <button disabled id='salvar_cliente' type='button' class='btn btn-success btn-circle btn-lg' title='Salvar'><i class='fa fa-save'></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Dados da entrega
            </div>
            <div class='panel-body'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='row'>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Taxa de Entrega</label>";
                                        
                                    $cf   = new connectionFactory();
                                    $conn = $cf->getConnection();
                                        
                                    $BDAO   = new bairroDAO($conn);
                                    $bairro = $BDAO->buscarBairro($cliente->getBairro());
                                        
                                    echo "<input value='R$ ".valorMoedaVirgula($bairro->getTaxaEntrega())."' readonly='readonly' name='taxaEntrega' id='taxaEntrega' class='form-control'>
                                </div>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Entregador*</label>
                                    <select id='entregador' class='form-control'>";
                                        
                                        imprimeEntregadoresSelect($pedidoEntrega->getEntregadorId());
                                        
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
                Pedido
            </div>
            <div class='panel-body'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div id='listas'>";
                            
                        $cf   = new connectionFactory();
                        $conn = $cf->getConnection();
                        
                        $PDAO   = new pedidoDAO($conn);
                        $pedido = $PDAO->buscarPedido($pedidoEntrega->getPedidoId());
                      
                        //aqui sao inseridos os pedidos
                        $cf   = new connectionFactory();
                        $conn = $cf->getConnection();
                      
                        $IDAO  = new itemDAO($conn);
                        $itens = $IDAO->listarItensPedido($pedido->getId());
                        
                        if(isset($itens)){
                            
                            $cont = 0;
                            $total = $bairro->getTaxaEntrega();
                            
                            foreach($itens as $i) {
                                
                                $cf   = new connectionFactory();
                                $conn = $cf->getConnection();
                                
                                $PDAO    = new produtoDAO($conn);
                                $produto = $PDAO->buscarProduto($i->getProdutoId());
                                
                                $total += $produto->getPreco();
                                
                                echo "<div class='customBordered'>
                                    <div class='row'>
                                        <div class='col-lg-2'>
                                            <div class='form-group'>
                                                <label>Categoria</label>
                                                <select disabled onchange='atualizaSelectProdutos('+contadorItens+')' name='categoria'+ contadorItens +'' id='categoria'+ contadorItens +'' class='form-control categoria'>";
                                                
                                                    imprimeCategoriasProdutoSelect($produto->getCategoria());
                                                    
                                                echo "</select>
                                            </div>
                                        </div>
                                        <div class='col-lg-2'>
                                            <div class='form-group'>
                                                <label>Produto</label>
                                                <select disabled onchange='atualizaPrecoProduto('+contadorItens+')' name='produto'+ contadorItens +'' id='produto'+ contadorItens +'' class='form-control produto'>";
                                                
                                                echo "<option value='0'>--</option>".imprimeProdutosSelectCategoria($produto->getCategoria(), $produto->getId());
                                                
                                            echo "</select>
                                            </div>
                                        </div>
                                        <div class='col-lg-2'>
                                            <div class='form-group'>
                                                <label>Valor</label>
                                                <input readonly='readonly' name='preco'+ contadorItens +'' id='preco'+ contadorItens +'' value='R$ ".valorMoedaVirgula($produto->getPreco())."' class='form-control preco'>
                                            </div>
                                        </div>
                                        <div class='col-lg-5'>
                                            <div class='form-group'>
                                                <label>Observações</label>
                                                <input disabled id='observacao'+ contadorItens +'' name='observacao'+ contadorItens +'' value='".$i->getObservacao()."' class='form-control'>
                                            </div>
                                        </div>
                                        <div class='col-lg-1 text-center'>
                                            <button disabled title='Remover Item' type='button' id='remover_campo' class='btn btn-danger btn-circle remover_campo custom-margin-top'><i class='fa fa-times'></i></button>
                                        </div>
                                    </div>
                                </div>";
                            }
                        }
                            
                        echo "</div>
                        <div class='row'>
                            <div class='col-lg-12 text-center'>
                                <button disabled title='Adicionar Item' id='add_field' type='button' class='btn btn-primary btn-circle btn-lg remover_campo'><i class='fa fa-plus'></i></button>
                                <button disabled title='Adicionar item meio a meio' id='add_field_meio' type='button' class='btn btn-primary btn-circle btn-lg remover_campo'><i class='fa fa-pie-chart'></i></button>                    </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Dados de pagamento
            </div>
            <div class='panel-body'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Total</label>
                                    <input id='total' type='text' readonly='readonly' value='R$ ".valorMoedaVirgula($total)."' class='form-control'>
                                </div>
                            </div>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Forma de pagamento</label>";
                                        
                                    $dinheiro = $pedido->getFormaPagamentoId()==1?" selected='selected'":'';
                                    $credito  = $pedido->getFormaPagamentoId()==2?" selected='selected'":'';
                                    $debito   = $pedido->getFormaPagamentoId()==3?" selected='selected'":'';
                                        
                                    echo "<select disabled id='forma_pagamento' class='form-control'>
                                        <option".$dinheiro." value='1'>Dinheiro</option>
                                        <option".$credito." value='2'>Cartão Crédito</option>
                                        <option".$debito." value='3'>Cartão Débito</option>
                                    </select>
                                </div>
                            </div>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Troco</label>
                                    <input disabled value='R$ ".valorMoedaVirgula($pedidoEntrega->getTroco())."' id='troco' class='form-control'>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-12 text-center'>
                                <button type='button' id='entregar_pedido' class='btn btn-success btn-circle btn-lg' title='Entregar Pedido'><i class='fa fa-check'></i></button>
                                <button type='button' id='".$pedidoEntrega->getId()."' class='imprimir_pedido btn btn-primary btn-circle btn-lg' title='Imprimir'><i class='fa fa-print'></i></button>                                
                                <button type='button' id='".$pedidoEntrega->getId()."' class='cancelar_pedido btn btn-danger btn-circle btn-lg' title='Cancelar Pedido'><i class='fa fa-times'></i></button>
                                <a href='pedidos-entrega.php' class='nounderline'>
                                    <button title='Voltar' alt='Voltar' type='button' class='btn btn-primary btn-circle btn-lg'><i class='fa fa-arrow-left'></i></button>
                                </a>";
								
								$cf   = new connectionFactory();
								$conn = $cf->getConnection();
								
								$EDAO = new estadoDAO($conn);
								$estado = $EDAO->buscarEstado($cliente->getEstado());
								
								$destino = $cliente->getEndereco().", ".$cliente->getNumero().", ".$bairro->getNome().", ".$cliente->getCidade()."/".$estado->getNome()." - Brasil";
								
								echo "<a href='rota.php?endereco=".$destino."'>
									<button type='button' id='' class='btn btn-warning btn-circle btn-lg' title='Visualizar Rota'><i class='fa fa-motorcycle'></i></button>
								</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }
    
?>