<?php 
    
    session_start();
    
    if(isset($_GET['logout'])){
        
        session_unset();
        session_destroy();
    }
	
	if(isset($_SESSION['DISCART_AFTER']) && $_SESSION['DISCART_AFTER'] < date('Y-m-d H:i:s', time())){
		
		session_unset();
		session_destroy();
	}
    
    if(isset($_SESSION['SESS_MEMBER_ID'])){
        header("location: index.php");
        exit();
    }
	
	include_once '../../controller/connectionFactory.php';
	include_once '../../model/DAO/configsDAO.php';
	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pastone - Entrar</title>
    <link rel="shortcut icon" type="image/png" href="../../../public/img/favicon-16x16.png"/>
    <link href="../../../public/css/styleLogin.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    
    <style>
        .login div.erro {
            padding-top: 5px;
            font-size: 17px;
			font-family: 'Exo', sans-serif;
			font-weight: 400;
            
            <?php 
            
			if(isset($_GET['erro']) || isset($_GET['expire']) || isset($_GET['block'])){
                echo "color:#f16969;";
            }
            
			if(isset($_GET['logout'])){
                echo "color:#68f17f;"; 
				
            }
			
            ?>
        }
    </style>
</head>
    
<body>
    <div class="body"></div>
    <div class="grad"></div>
	<?php
		
		$cf   = new connectionFactory();
		$conn = $cf->getConnection();
		
		$confDAO = new configsDAO($conn);
		$configs = $confDAO->buscarConfigs();
		
		$expiracao = $configs->getExpiracao();
		
		date_default_timezone_set('America/Sao_Paulo');
		$atual = date('Y-m-d H:i:s', time());
			
		$today_time = strtotime($atual);
		$expire_time = strtotime($expiracao);
		
		if($expire_time < $today_time) {
			
			echo "<div class='expire'>
				<div>Seu plano expirou em ".date('Y-m-d H:i:s', $expire_time)."</div>
				<div>Renove seu plano para continuar utilizando os serviços</div>
				<div><a href='http://www.linksantos.com/contato.php'>Link Santos</a></div>
				</div>";
			
		} else {
			
			echo "<div class='header'>
				<div>Pastone<span>Web</span></div>
				</div>
				<br>
				<div class='login'>					
					<form method='post' action='autorizador.php'>
						<input type='text' placeholder='Usuário' id='email' name='email' required><br>
						<input type='password' placeholder='Senha' id='senha' name='senha' required><br>
						<input type='submit' value='Entrar'>";
				
			if(isset($_GET['erro'])){
				
				echo "<br><div class='erro'>Falha no login</div>";
			}
			
			if(isset($_GET['block'])){
				
				echo "<br><div class='erro'>Usuário bloqueado</div>";
			}
			
			if(isset($_GET['logout'])){
				
				echo "<br><div class='erro'>Logout concluido</div>";
			}
			
			if(isset($_GET['expire'])){
				
				echo "<br><div class='erro'>Sessão expirada</div>";
			}
			
			echo "</form>
			</div>";
		}
		
	?>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>