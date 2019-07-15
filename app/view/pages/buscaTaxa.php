<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/bairroDAO.php';
    
    $bairro = $_POST['bairro'];
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
    
    $BDAO   = new bairroDAO($conn);
    $bairro = $BDAO->buscarBairro($bairro);
    
    echo $bairro->getTaxaEntrega();
    
?>