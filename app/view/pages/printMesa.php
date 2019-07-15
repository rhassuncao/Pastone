<?php
    
    include_once '../../model/DAO/pedidoDAO.php';
    include_once '../../model/DAO/pedidoMesaDAO.php';
    include_once '../../model/DAO/itemDAO.php';
    include_once '../../model/DAO/produtoDAO.php';
    include_once '../../controller/connectionFactory.php';
    include_once '../functionsTratamentoString.php';
    include_once '../../model/DAO/mesaDAO.php';
    include_once '../functionsPrint.php';
    
    $pedidoMesaId = $_GET['pedidoMesaId'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $PDAO = new pedidoMesaDAO($conn);
    $p    = $PDAO->buscarPedidoMesa($pedidoMesaId);
    
    $txt_cabecalho[] = 'Pedido : #'.$p->getPedidoId().' - Mesa';
    
    $txt_itens[] = array('---------------------------------', '-------');
    $txt_itens[] = array('            Produto             |', ' Valor ');
    $txt_itens[] = array('---------------------------------', '-------');
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $IDAO   = new itemDAO($conn);
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
                    
                    $txt_itens[] = array($obs, "");
                    $obs = "";
                }  
            }
            
            $txt_itens[] = array("", "");
            
            $tot_itens += $produto->getPreco();
        }
    }
    
    $aux_valor_total = 'Total: R$ '.valorMoedaVirgula($tot_itens);
    $total_espacos = $n_colunas - strlen($aux_valor_total);
    $espacos = '';
    
    for($i = 0; $i < $total_espacos; $i++){
        $espacos .= ' ';
    }
    
    $txt_valor_total = $espacos.$aux_valor_total;
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $P2DAO  = new pedidoDAO($conn);
    $pedido = $P2DAO->buscarPedido($p->getPedidoId());
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $MDAO = new mesaDAO($conn);
    $mesa = $MDAO->buscarMesa($p->getMesaId());     
    
    $txt_rodape[] = 'Horário: '.$pedido->getTempoInicio();
    $txt_rodape[] = 'Mesa: '.$mesa->getNome();
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
    
    for($i = 0; $i < $viasMesaSingle; $i++){
        
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
        <title>Pastone - Imprimir pedido Mesa</title>
    </head>
    <body>
        <pre><?php echo $txt ?>
        </pre>
    </body>
</html>