<?php

	function list_dir($start){
		$contents = scandir($start);
		foreach ($contents as $item) {
			if (is_dir("$start/$item") && (substr($item,0,1) != '.')){
				list_dir("$start/$item");
			} else {
				echo $item,"\n";
			}
		}
	}

	list_dir('.');
