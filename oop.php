<?php

class Person
{
	private $name;

	private function __get($property_name){
		echo "在直接获取私有属性值的时候，自动调用了这个__get()方法\n";
		if (isset($this->property_name)) {
			return $this->property_name;
		} else {
			return false;
		}
	}

	private function __set($property_nane,$value){
		echo "在直接设置私有属性值的时候，自动调用了这个__set()方法为私有属性赋值\n";
		$this->property_name = $value;
	}
}

$p1 = new Person();

//直接为私有属性赋值的操作， 会自动调用__set()方法进行赋值
$p1->name="张三";
//$p1->sex="男";
//$p1->age=20;
//直接获取私有属性的值， 会自动调用__get()方法，返回成员属性的值
//echo "姓名：".$p1->name."\n";
//echo "性别：".$p1->sex."\n";
//echo "年龄：".$p1->age."\n";
