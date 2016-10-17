<?php

interface phoneItem{
	
	public function phoneName();

	public function phoneSize();
}

class iPhone implements phoneItem{
	public function phoneName(){
		echo 'iPhone...',PHP_EOL;
	}
	
	public function phoneSize(){
		echo 'iPhone 4.7...',PHP_EOL;
	}
}

class miPhone implements phoneItem{
	public function phoneName(){
		echo 'miPhone...',PHP_EOL;
	}

	public function phoneSize(){
		echo 'miPhone size 5.3...',PHP_EOL;
	}
}

class contextStrategy{
	private $_item;

	function getItem($item_name){
		try{
			$class = new ReflectionClass($item_name);
			$this->_item = $class->newInstance();
		}catch(ReflectionException $e){
			echo $e->getMessage(),PHP_EOL;
			$this->_item = '';
		}
	}

	function phoneName(){
		$this->_item->phoneName();
	}

	function phoneSize(){
		$this->_item->phoneSize();
	}
}


$strategy = new contextStrategy();
$strategy->getItem('iPhone');
$strategy->phoneName();
$strategy->phoneSize();

$strategy->getItem('miPhone');
$strategy->phoneName();
$strategy->phoneSize();
