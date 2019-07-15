<?php
    
    include_once '../../model/DAO/pedidoDAO.php';
    include_once '../../model/DAO/pedidoEntregaDAO.php';
    include_once '../../model/DAO/itemDAO.php';
    include_once '../../model/DAO/produtoDAO.php';
    include_once '../../controller/connectionFactory.php';
    include_once '../functionsTratamentoString.php';
    include_once '../../model/DAO/clienteDAO.php';
    include_once '../../model/DAO/bairroDAO.php';
    include_once '../functionsPrint.php';
    include_once '../../model/DAO/estadoDAO.php';
    
    $pedidoEntregaId = $_GET['pedidoEntregaId'];
    
    $cf = new connectionFactory();
    $conn = $cf->getConnection();
    
    $PDAO = new pedidoEntregaDAO($conn);
    $p = $PDAO->buscarPedidoEntrega($pedidoEntregaId);
    
    $tot_itens = 0;
    
    $txt_cabecalho[] = 'Pedido : #'.$p->getPedidoId().' - Entrega';
    
    $txt_itens[] = array('---------------------------------', '-------');
    $txt_itens[] = array('            Produto             |', ' Valor ');
    $txt_itens[] = array('---------------------------------', '-------');
    
    $cf = new connectionFactory();
    $conn = $cf->getConnection();
    
    $IDAO = new itemDAO($conn);
    $itens2 = $IDAO->listarItensPedido($p->getPedidoId());
    
    if(isset($itens2)){
        
        foreach($itens2 as $i) {
            
            $cf = new connectionFactory();
            $conn = $cf->getConnection();
            
            $PDAO = new produtoDAO($conn);
            $produto = $PDAO->buscarProduto($i->getProdutoId());
            
            $txt_itens[] = array($produto->getNome(), valorMoedaVirgula($produto->getPreco()));
            
            $obs = $i->getObservacao();
            
            while (strlen($obs) > 0){
                
                if(strlen($obs) > 33){
                    
                    $txt_itens[] = array(substr($obs, 0, 33), "");
                    $obs = substr($obs, 33, strlen($obs) - 33);
                    
                } else {
                    
                    $txt_itens[] = array( $obs, "");
                    $obs = "";
                }  
            }
            
            $txt_itens[] = array("", "");
            
            $tot_itens += $produto->getPreco();
        }
    }
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $CDAO    = new clienteDAO($conn);
    $cliente = $CDAO->buscarCliente($p->getClienteId());
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $BDAO   = new bairroDAO($conn);
    $bairro = $BDAO->buscarBairro($cliente->getBairro());
    
    $txt_itens[] = array('Entrega '.$bairro->getNome(), valorMoedaVirgula($bairro->getTaxaEntrega()));
    $tot_itens += $bairro->getTaxaEntrega();
    
    $aux_valor_total = 'Total: R$ '.valorMoedaVirgula($tot_itens);
    $total_espacos = $n_colunas - strlen($aux_valor_total);
    $espacos = '';
    
    for($i = 0; $i < $total_espacos; $i++){
        $espacos .= ' ';
    }
    
    $txt_valor_total = $espacos.$aux_valor_total;
    
    $cf = new connectionFactory();
    $conn = $cf->getConnection();
    
    $P2DAO = new pedidoDAO($conn);
    $pedido = $P2DAO->buscarPedido($p->getPedidoId());
    
    $txt_rodape[] = 'Horário: '.$pedido->getTempoInicio();
    $txt_rodape[] = 'Cliente: '.$cliente->getNome();
    $txt_rodape[] = 'Telefone 1: '.telefoneMask($cliente->getTelefone1());
    $txt_rodape[] = 'Telefone 2: '.telefoneMask($cliente->getTelefone2());
    $txt_rodape[] = 'Telefone 3: '.telefoneMask($cliente->getTelefone3());
    $txt_rodape[] = $cliente->getEndereco()." n ".$cliente->getNumero();
    $txt_rodape[] = "Complemento: ";
	$txt_rodape[] = $cliente->getComplemento();
    
    $cf = new connectionFactory();
    $conn = $cf->getConnection();
    
    $EDAO = new estadoDAO($conn);
    $estado = $EDAO->buscarEstado($cliente->getEstado());
    
    $txt_rodape[] = $bairro->getNome()." - ".$cliente->getCidade()."/".$estado->getNome();
    $txt_rodape[] = "Referência: ".$cliente->getPontoReferencia();
    
    $pagamento = '';
    
    $pagamento = (($pedido->getFormaPagamentoId()==1)?"Dinheiro":$pagamento);
    $pagamento = (($pedido->getFormaPagamentoId()==2)?"Cartao de credito":$pagamento);
    $pagamento = (($pedido->getFormaPagamentoId()==3)?"Cartao de debito":$pagamento);
    
    $txt_rodape[] = 'Forma de pagamento: '.$pagamento;
    $txt_rodape[] = 'Levar Troco: '.valorMoedaVirgula($p->getTroco());
    $txt_rodape[] = '_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ';
    $txt_rodape[] = ' ';
    
    $cabecalho = array_map("centraliza", $txt_cabecalho);
    
    foreach ($txt_itens as $item) {
        
        $itens[] = addEspacos($item[0], 33, 'F')
            . addEspacos($item[1], 7, 'F');
    }
    
    $txt = "";
    
    $txt2 = implode("\r\n", $cabecalho)
        . "\r\n"
        . implode("\r\n", $itens)
        . "\r\n"
        . $txt_valor_total // Sub-total
        . "\r\n\r\n"
        . implode("\r\n", $txt_rodape);
    
    for($i = 0; $i < $viasEntrega; $i++){
        
        $txt .= "\r\n".$txt2;
    }
    
    $txt .= implode("\r\n", $txt_espacamento);
    
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/png" href="../../../public/img/favicon-16x16.png"/>
        <title>Pastone - Imprimir pedido Entrega</title>
    </head>
    <body>
        <pre><?php echo $txt ?>
        </pre>
    </body>
</html>