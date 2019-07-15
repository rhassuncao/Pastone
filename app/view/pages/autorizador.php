<?php
    
    include_once '../../controller/connectionFactory.php';
    include_once '../../model/DAO/funcionarioDAO.php';
	include_once '../../model/DAO/configsDAO.php';
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    unset($_SESSION);
    session_start();
    
    $cf   = new connectionFactory();
    $conn = $cf->getConnection();
     
    $FDAO        = new funcionarioDAO($conn);
    $funcionario = $FDAO->login($email, $senha);
    
    if($funcionario->getId()) {
    	
		if($funcionario->getAtivo()==0){
			
			header("Location: login.php?block=true");
			
		} else {
			
			session_regenerate_id();
			
			$_SESSION['SESS_MEMBER_ID']    = $funcionario->getId();
			$_SESSION['SESS_FULL_NAME']    = $funcionario->getNome();
			$_SESSION['SESS_ACCESS_LEVEL'] = $funcionario->getCategoriaFuncionario();
			$_SESSION['DISCART_AFTER']     = date('Y-m-d H:i:s', time() + 86400);
			
			session_write_close();
			
			$cf   = new connectionFactory();
			$conn = $cf->getConnection();
			
			$confDAO = new configsDAO($conn);
			$configs = $confDAO->buscarConfigs();
			
			$expiracao = $configs->getExpiracao();
			
			date_default_timezone_set('America/Sao_Paulo');
			$atual = date('Y-m-d H:i:s', time());
			
			$today_time = strtotime($atual);
			$expire_time = strtotime($expiracao);
			
			if($expire_time - 2592000 < $today_time) { 
				
				$diferenca = $expire_time - $today_time;
				$days = $diferenca / 86400;
				header("location: expire.php?days=".intval($days));
				
			} else {
				
				header("location: index.php");
			}
		}
     
    } else {
		
		header("Location: login.php?erro=true");
    }
	
	exit();
    
?>