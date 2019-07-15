<?php
    
    include_once '../../model/DAO/pedidoMesaDAO.php';
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/mesaDAO.php';
    include_once '../../model/DAO/pedidoDAO.php';
    include_once '../../model/DAO/itemDAO.php';
    include_once '../../model/DAO/produtoDAO.php';
    include_once '../functionsCategoriaProduto.php';
    include_once '../functionsProduto.php';
    include_once '../functionsTratamentoString.php';
    
    function imprimePedidosMesasPanel($mesa){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $PDAO    = new pedidoMesaDAO($conn);
        $pedidos = $PDAO->listarPedidosMesa($mesa);
        
        $output = "";
        
        if(isset($pedidos)){
            
            foreach($pedidos as $p) {
                
                switch ($p->getStatusPedidoId()) {
                    case 1:
                        $panelType = "panel-primary";
                        break;
                    case 2:
                        $panelType = "panel-green";
                        break;
                    case 3:
                        $panelType = "panel-red";
                        break;
                     default:
                        $panelType = "panel-primary";
                }
                
                $output .= "<div class='col-lg-4'>
                    <div class='panel ".$panelType."'>
                        <div class='panel-heading'>
                            #".$p->getPedidoId()."
                        </div>
                        <div class='panel-body'>";
                            
                            $cf   = new connectionFactory();
                            $conn = $cf->getConnection();
                            
                            $IDAO  = new itemDAO($conn);
                            $itens = $IDAO->listarItensPedido($p->getPedidoId());
                            
                            $output .= "<p class='text-center font-weight-bold'>Pedido</p>";
                            
                            if(isset($itens)){
                                
                                foreach($itens as $i) {
                                    
                                    $cf   = new connectionFactory();
                                    $conn = $cf->getConnection();
                                    
                                    $PDAO = new produtoDAO($conn);
                                    $produto = $PDAO->buscarProduto($i->getProdutoId());
                                    
                                    $output .= "<div class='customBordered'>";
                                    $output .= "<p>".$produto->getNome()."</p>";
                                    $output .= "<p>Observação: ".$i->getObservacao()."</p>";
                                    $output .= "</div>";
                                }
                            }
                            
                            $cf   = new connectionFactory();
                            $conn = $cf->getConnection();
                            
                            $PPDAO   = new PedidoDAO($conn);
                            $pedido = $PPDAO->buscarPedido($p->getPedidoId());
                            
                            $output .= "<p class='text-center font-weight-bold'>Informações</p>";
                            
                            $output .= "<div class='customBordered'>";
                            $output .= "Hora: ".$pedido->getTempoInicio();
                            $output .= "</div>";
                            
                        $output .= "</div>
                        <div class='panel-footer'>
                            <button type='button' id='".$p->getId()."' class='btn btn-danger btn-circle cancelar_pedido' title='Cancelar'><i class='fa fa-times'></i></button>
                            <a href='pedido-mesa.php?id=".$p->getId()."&mesaId=".$mesa."' class='nounderline'>
                                <button type='button' class='btn btn-primary btn-circle' title='Ver'><i class='fa fa-eye'></i></button>
                            </a>
                            <button type='button' id='".$p->getId()."' class='btn btn-success btn-circle entregar_pedido' title='Entregar'><i class='fa fa-check'></i></button>
                        </div>
                    </div>
                </div>";
            }
        }
        
        if($output==""){
            
            $output .= "
            <div style='margin: 15px;'>
                <div class='customBordered'>Mesa vazia - Clique no botão \"Novo Pedido\" para adicionar um pedido</div>
            </div>";
        }
        
        return $output;
    }
    
    function mostrarPedidoMesa($id){
        
        $cf   = new connectionFactory();
        $conn = $cf->getConnection();
        
        $PDAO       = new pedidoMesaDAO($conn);
        $pedidoMesa = $PDAO->buscarPedidoMesa($id);
        
        $pendente = '';
        $entregue = '';
        
        if($pedidoMesa->getStatusPedidoId()==1){
            
            $pendente = 'checked';
            
        } else {
            
            $entregue = 'checked';
        }
        
        echo "<div class='panel panel-default'>
                <div class='panel-heading'>
                    Dados da Mesa
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
                                        <label>Mesa*</label>";
                                            
                                        $cf   = new connectionFactory();
                                        $conn = $cf->getConnection();
                                            
                                        $MDAO = new mesaDAO($conn);
                                        $mesa = $MDAO->buscarMesa($pedidoMesa->getMesaId());     
                                            
                                        echo "<input id='id' disabled value='".$mesa->getNome()."' name='id' required maxlength='50' class='form-control'>
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
                                $pedido = $PDAO->buscarPedido($pedidoMesa->getPedidoId());
                                
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
                                <div class='col-lg-12'>
                                    <div class='form-group'>
                                        <label>Total</label>
                                        <input id='total' readonly='readonly' value='R$ ".valorMoedaVirgula($total)."' class='form-control'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-lg-12 text-center'>
                                    <button type='button' id='".$pedidoMesa->getId()."' title='Imprimir' class='btn btn-primary btn-circle btn-lg imprimir_pedido'><i class='fa fa-print'></i></button>                                    
                                    <a href='pedidos-mesa.php'>
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