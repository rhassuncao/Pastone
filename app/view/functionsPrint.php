<?php
    
    include_once '../../model/DAO/itemDAO.php';
    include_once '../../model/DAO/configsDAO.php';
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $confDAO = new configsDAO($conn);
    $configs = $confDAO->buscarConfigs();
    
    $n_colunas        = $configs->getNumeroColunas();
    $noveLinhasDepois = ($configs->getNoveLinhasDepois()==1)?true:false;
    $viasBalcao       = $configs->getViasBalcao();
    $viasEntrega      = $configs->getViasEntrega();
    $viasMesa         = $configs->getViasMesa();
    $viasMesaSingle   = $configs->getViasMesaSingle();    
    $tot_itens        = 0;
    
    function centraliza($info){
        
        global $n_colunas;
        
        $aux = strlen($info);
        
        if ($aux < $n_colunas) {
            
            $espacos = floor(($n_colunas - $aux) / 2);
            
            $espaco = '';
            for ($i = 0; $i < $espacos; $i++){
                $espaco .= ' ';
            }
            
            return $espaco.$info;
            
        } else {
            return substr($info, 0, $n_colunas);
        }
        
    }
    
    function addEspacos($string, $posicoes, $onde){
        
        $aux = strlen($string);
        
        if ($aux >= $posicoes)
            return substr ($string, 0, $posicoes);
        
        $dif = $posicoes - $aux;
        
        $espacos = '';
        
        for($i = 0; $i < $dif; $i++) {
            $espacos .= ' ';
        }
        
        if ($onde === 'I')
            return $espacos.$string;
        else
            return $string.$espacos;
    }
    
    $txt_cabecalho = array();
    
    $txt_itens = array();
    $txt_valor_total = '';
    
    $txt_rodape = array();
    $txt_rodape[] = '========================================';
    
    $txt_espacamento = array();
    
    if($noveLinhasDepois == true){
        
        $txt_espacamento[] = ' ';
        $txt_espacamento[] = ' ';
        $txt_espacamento[] = ' ';
        $txt_espacamento[] = ' ';
        $txt_espacamento[] = ' ';
        $txt_espacamento[] = ' ';
        $txt_espacamento[] = ' ';
        $txt_espacamento[] = ' ';
        $txt_espacamento[] = ' ';
    }
    
?>