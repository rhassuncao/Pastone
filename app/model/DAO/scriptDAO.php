<?php

include_once '../../model/Script.php';

class scriptDAO{
	
	private $conn;
	
	function __construct($conn){
		
		$this->conn = $conn;
	}
	
	function buscarScript(){
		
		$query = "select * from script";
		
		$result = $this->conn->query($query);
		$script = $result->fetch_assoc();
		
		$script2 = new Script(
			$script['id'], 
			$script['script01'],
			$script['script02'],
			$script['script03'],
			$script['script04'],
			$script['script05'],
			$script['script06'],
			$script['script07'],
			$script['script08'],
			$script['script09'],
			$script['script10']);
		
		$this->conn->close();
		return $script2;
	}
	
	function atualizarScript($script){
		
		$retorno = true;
		
		//prepare
		if (!($stmt = $this->conn->prepare("update script SET script01=?, script02=?, script03=?, 
		script04=?, script05=?, script06=?, script07=?, script08=?, script09=?, script10=?"))) {
			
			$retorno = "Prepare failed: (".$this->conn->errno.")".$this->conn->error;
		}
		
		//bind
		$script01 = $script->getScript01();
		$script02 = $script->getScript02();
		$script03 = $script->getScript03();
		$script04 = $script->getScript04();
		$script05 = $script->getScript05();
		$script06 = $script->getScript06();
		$script07 = $script->getScript07();
		$script08 = $script->getScript08();
		$script09 = $script->getScript09();
		$script10 = $script->getScript10();
		
		if(!$stmt->bind_param("ssssssssss", 
							   $script01, 
							   $script02, 
							   $script03,
							   $script04,
							   $script05,
							   $script06,
							   $script07,
							   $script08,
							   $script09,
							   $script10)) {
			
			$retorno = "Binding parameters failed: (".$stmt->errno.")".$stmt->error;
		}
		
		//execute
		if (!$stmt->execute()) {
			
			$retorno = "Execute failed: (".$stmt->errno.")".$stmt->error;
		}
		
		//close
		$stmt->close();
		$this->conn->close();
		return $retorno;
	}
} 

?>