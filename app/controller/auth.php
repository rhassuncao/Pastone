<?php
	
    session_start();
		
	if(!isset($_SESSION['SESS_MEMBER_ID'])) {
			
		session_write_close();
			
		header("location: ../pages/login.php");
		exit();
	}
	
	if($_SESSION['DISCART_AFTER'] < date('Y-m-d H:i:s', time())){
		
		session_unset();
		session_destroy();
		
		header("location: ../pages/login.php?expire=true.php");
		exit();
	}
    
?>