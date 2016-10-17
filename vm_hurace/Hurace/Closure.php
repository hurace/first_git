<?php

function operate($operate){
	if($operate == '-'){
		return function($a,$b){
				return $a - $b;
			};
	}else{
		return function($a,$b){
				return $a + $b;
			};
	}
}

$sub = operate('-');

echo $sub(3,4),PHP_EOL;

$add = operate();

echo $add(3,4),PHP_EOL;
