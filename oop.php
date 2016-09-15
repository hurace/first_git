<?php

class Person
{
	public $name;

	public function __get($property_name){
		echo "在直接获取私有属性值的时候，自动调用了这个__get()方法\n";
		if (isset($this->property_name)) {
			return $this->property_name;
		} else {
			return false;
		}
	}

	public function __set($property_nane,$value){
		echo "在直接设置私有属性值的时候，自动调用了这个__set()方法为私有属性赋值\n";
		$this->property_name = $value;
	}
	
	public function __isset($nm){
		echo "当在类外部使用isset()函数测定私有成员\$nm时，自动调用\n";
		return isset($this->nm);
	}

	public function __unset($nm){
		echo "当在类外部使用unset()函数来删除私有成员时自动调用的\n";
		unset($this->nm);
	}	
}

$p1 = new Person();

//直接为私有属性赋值的操作， 会自动调用__set()方法进行赋值
//$p1->name="张三";
//$p1->sex="男";
//$p1->age=20;
//直接获取私有属性的值， 会自动调用__get()方法，返回成员属性的值
//echo "姓名：".$p1->name."\n";
//echo "性别：".$p1->sex."\n";
//echo "年龄：".$p1->age."\n";






$p1->name="this is a person name";
//在使用isset()函数测定私有成员时，自动调用__isset()方法帮我们完成，返回结果为true
echo var_dump(isset($p1->name))."\n";
echo $p1->name."\n";
//在使用unset()函数删除私有成员时，自动调用__unset()方法帮我们完成，删除name私有属性
unset($p1->name);
//已经被删除了， 所这行不会有输出
echo $p1->name;
