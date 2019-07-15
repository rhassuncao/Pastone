<?php
    
    include_once '../../model/DAO/mesaDAO.php';
    include_once '../../model/DAO/pedidoDAO.php';
    include_once '../../model/DAO/pedidoMesaDAO.php';
    include_once '../../model/DAO/itemDAO.php';
    include_once '../../model/DAO/produtoDAO.php';
    include_once '../../controller/connectionFactory.php';
    include_once '../functionsTratamentoString.php';
    include_once '../functionsPrint.php';
    
    $mesa = $_GET['pedidoMesaId'];
    
    $cf = new connectionFactory();
    $conn = $cf->getConnection();
    
    $PDAO = new pedidoMesaDAO($conn);
    $pedidos = $PDAO->listarPedidosMesaNaoCancelados($mesa);
    
    $tot_itens = 0;
    
    $txt_cabecalho[] = 'Mesa : #'.$mesa.' - Fechamento';
    
    if(isset($pedidos)){
        
        $txt_itens[] = array('----', '-----------------------------', '-------');
        $txt_itens[] = array('Ped|', '          Produto           |', ' Valor ');
        $txt_itens[] = array('----', '-----------------------------', '-------');
        
        foreach($pedidos as $p) {
            
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
                    
                    $txt_itens[] = array($p->getPedidoId(), $produto->getNome(), valorMoedaVirgula($produto->getPreco()));
                    
                    $obs = $i->getObservacao();
                    
                    while (strlen($obs) > 0){
                        
                        if(strlen($obs) > 29){
                            
                            $txt_itens[] = array("", substr($obs, 0, 29), "");
                            $obs = substr($obs, 29, strlen($obs) - 29);
                            
                        } else {
                            
                            $txt_itens[] = array("", $obs, "");
                            $obs = "";
                        }  
                    }
                    
                    $txt_itens[] = array("", "", "");
                    
                    $tot_itens += $produto->getPreco();
                }
            }
        }
    }
    
    $aux_valor_total = 'Total: R$ '.valorMoedaVirgula($tot_itens);
    $total_espacos = $n_colunas - strlen($aux_valor_total);
    $espacos = '';
    
    for($i = 0; $i < $total_espacos; $i++){
        $espacos .= ' ';
    }
    
    $txt_valor_total = $espacos.$aux_valor_total;
    
    $txt_rodape[] = '_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ';
    $txt_rodape[] = ' ';
    
    $cabecalho = array_map("centraliza", $txt_cabecalho);
    
    foreach ($txt_itens as $item) {
        
        $itens[] = addEspacos($item[0], 4, 'F')
            . addEspacos($item[1], 29, 'F')
            . addEspacos($item[2], 7, 'F');
    }
    
    $txt = "";
    
    $txt2 = implode("\r\n", $cabecalho)
        . "\r\n"
        . implode("\r\n", $itens)
        . "\r\n"
        . $txt_valor_total // Sub-total
        . "\r\n\r\n"
        . implode("\r\n", $txt_rodape);
    
    for($i = 0; $i < $viasMesa; $i++){
        
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
        <title>Pastone - Imprimir Fechamento Mesa</title>
    </head>
    <body>
        <pre><?php echo $txt ?>
        </pre>
    </body>
</html>