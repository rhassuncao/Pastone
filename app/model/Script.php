<?php

class Script{
	
	private $id;
	private $script01;
	private $script02;
	private $script03;
	private $script04;
	private $script05;
	private $script06;
	private $script07;
	private $script08;
	private $script09;
	private $script10;
	
	function __construct($id, $script01, $script02, $script03, $script04,
						 $script05, $script06, $script07, $script08,
						 $script09, $script10){
		
		$this->id       = $id;
		$this->script01 = $script01;
		$this->script02 = $script02;
		$this->script03 = $script03;
		$this->script04 = $script04;
		$this->script05 = $script05;
		$this->script06 = $script06;
		$this->script07 = $script07;
		$this->script08 = $script08;
		$this->script09 = $script09;
		$this->script10 = $script10;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getScript01(){
		return $this->script01;
	}
	
	public function setScript01($script01){
		$this->script01 = $script01;
	}
	
	public function getScript02(){
		return $this->script02;
	}
	
	public function setScript02($script02){
		$this->script02 = $script02;
	}
	
	public function getScript03(){
		return $this->script03;
	}
	
	public function setScript03($script03){
		$this->script03 = $script03;
	}
	
	public function getScript04(){
		return $this->script04;
	}
	
	public function setScript04($script04){
		$this->script04 = $script04;
	}
	
	public function getScript05(){
		return $this->script05;
	}
	
	public function setScript05($script05){
		$this->script05 = $script05;
	}
	
	public function getScript06(){
		return $this->script06;
	}
	
	public function setScript06($script06){
		$this->script06 = $script06;
	}
	
	public function getScript07(){
		return $this->script07;
	}
	
	public function setScript07($script07){
		$this->script07 = $script07;
	}
	
	public function getScript08(){
		return $this->script08;
	}
	
	public function setScript08($script08){
		$this->script08 = $script08;
	}
	
	public function getScript09(){
		return $this->script09;
	}
	
	public function setScript09($script09){
		$this->script09 = $script09;
	}
	
	public function getScript10(){
		return $this->script10;
	}
	
	public function setScript10($script10){
		$this->script10 = $script10;
	}
}

?>