<?php
    
    include_once '../../model/DAO/pedidoBalcaoDAO.php';
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/statusPedidoDAO.php';
    include_once '../../model/DAO/pedidoDAO.php';
    include_once '../../model/DAO/itemDAO.php';
    include_once '../../model/DAO/produtoDAO.php';
    include_once '../functionsCategoriaProduto.php';
    include_once '../functionsProduto.php';
    include_once '../functionsTratamentoString.php';
    
    function imprimePedidosBalcaoPendente(){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $CDAO          = new pedidoBalcaoDAO($conn);
        $pedidosBalcao = $CDAO->listarPedidosBalcaoPendente();
        
        $output = "";
        
        if(isset($pedidosBalcao)){
            
            $cont = 0;
            
            foreach($pedidosBalcao as $p) {
                
                $class   = ($cont%2==0)?"even gradeC":"odd gradeA";
                $output .= "<tr class='$class'>
                            <td><a href='pedido-balcao.php?id=".$p->getId()."'>".$p->getPedidoId()."</a></td>
                            <td>".$p->getNomeCliente()."</td>";
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $CDAO         = new statusPedidoDAO($conn);
                $statusPedido = $CDAO->buscarStatusPedido($p->getStatusPedidoId());
                
                $output .= "<td>".$statusPedido->getNome()."</td>";
                
                $cf   = new connectionFactory();
                $conn = $cf->getConnection();
                
                $PDAO   = new PedidoDAO($conn);
                $pedido = $PDAO->buscarPedido($p->getPedidoId());
                
                $output .= "<td>".$pedido->getTempoInicio()."</td>";
                
                $output .= "</tr>";
                
                $cont++;
            }
        }
        
        echo $output;
    }
    
    function mostrarPedidoBalcao($id){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $PDAO         = new pedidoBalcaoDAO($conn);
        $pedidoBalcao = $PDAO->buscarPedidoBalcao($id);
        
        $pendente = '';
        $entregue = '';
        
        if($pedidoBalcao->getStatusPedidoId()==1){
            
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
                            <div class='col-lg-6'>
                                <label>Situação</label>
                                <label class='radio-inline'>
                                    <input type='radio' name='ativo' id='optionsRadiosInline1' value='1' ".$pendente.">Pendente
                                </label>
                                <label class='radio-inline'>
                                    <input type='radio' name='ativo' id='optionsRadiosInline2' value='0'".$entregue.">Entregue
                                </label>
                            </div>
                            <div style='text-align: right;' class='col-lg-6'>
                                <label>Campos obrigatórios possuem (*)</label>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label>Nome*</label>
                                    <input id='id' disabled value=".$pedidoBalcao->getNomeCliente()." name='id' required maxlength='50' class='form-control'>
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
                        $pedido = $PDAO->buscarPedido($pedidoBalcao->getPedidoId());
                        
                        //aqui sao inseridos os pedidos
                        $cf   = new connectionFactory();
                        $conn = $cf->getConnection();
                        
                        $IDAO  = new itemDAO($conn);
                        $itens = $IDAO->listarItensPedido($pedido->getId());
                        
                        if(isset($itens)){
                            
                            $cont = 0;
                            $total = 0;
                            
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
                                            <button disabled title='Remover Item' style='margin-top: 26px;' type='button' id='remover_campo' class='btn btn-danger btn-circle remover_campo'><i class='fa fa-times'></i></button>
                                        </div>
                                    </div>
                                </div>";
                                }
                            }

                            echo "</div>
                            <div class='row'>
                                <div class='col-lg-12 text-center'>
                                    <button disabled title='Adicionar Item' id='add_field' type='button' class='btn btn-primary btn-circle btn-lg remover_campo'><i class='fa fa-plus'></i></button>
                                    <button disabled title='Adicionar item meio a meio' id='add_field_meio' type='button' class='btn btn-primary btn-circle btn-lg remover_campo'><i class='fa fa-pie-chart'></i></button>
                            </div>
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
                            <div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Total</label>
                                    <input id='total' readonly='readonly' value='R$ ".valorMoedaVirgula($total)."' class='form-control'>
                                </div>
                            </div>
                            <div class='col-lg-6'>
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
                        </div>
                        <div class='row'>
                            <div class='col-lg-12 text-center'>
                                <button type='button' id='entregar_pedido' class='btn btn-success btn-circle btn-lg' title='Entregar Pedido'><i class='fa fa-check'></i></button>
                                <button type='button' id='".$pedidoBalcao->getId()."' class='imprimir_pedido btn btn-primary btn-circle btn-lg' title='Imprimir'><i class='fa fa-print'></i></button>                                
                                <button type='button' id='".$pedidoBalcao->getId()."' class='cancelar_pedido btn btn-danger btn-circle btn-lg' title='Cancelar Pedido'><i class='fa fa-times'></i></button>
                                <a href='pedidos-balcao.php'>
                                    <button title='Voltar' alt='Voltar' type='button' class='btn btn-primary btn-circle btn-lg'><i class='fa fa-arrow-left'></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }
    
?>