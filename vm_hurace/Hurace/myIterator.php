<?php

class MyIterator implements \Iterator{
	protected $pos;
	protected $arr;
	
	public function __construct($array){
		$this->arr = $array;
		$this->pos = 0;
	}

	public function rewind(){
		echo __METHOD__,PHP_EOL;
		$this->pos = 0;
	}

	public function valid(){
		echo __METHOD__,PHP_EOL;
		return isset($this->arr[$this->pos]);
	}

	public function key(){
		echo __METHOD__,PHP_EOL;
		return $this->pos;
	}

	public function current(){
		echo __METHOD__,PHP_EOL;
		return $this->arr[$this->pos];
	}

	public function next(){
		echo __METHOD__,PHP_EOL;
		return ++$this->pos;
	}
}

$arr = array(1,2,3,4,5);
$it = new MyIterator($arr);
foreach($it as $key => $val){
	echo $key,'=>',$val,PHP_EOL;
}
