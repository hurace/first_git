<?php
 /**
 * 原型模式
 * 用原型实例指定创建对象的种类.并且通过拷贝这个原型来创建新的对象
 * @author lzs
 */

/**
 * 声明一个克隆自身的接口,即抽象原型角色
 * @author lzs
*/
interface Prototype{
	public function copy();
}

 /**
 * 实现克隆自身的操作,具体原型角色
 * @author lzs
 */
class ConcretePrototype implements Prototype{
	private $_name;

	public function __construct($name){
		$this->_name = $name;
	}
	
	public function getName(){
		return $this->_name;
	}

	public function setName($name){
		$this->_name = $name;
	}

	//克隆
	public function copy(){
		//浅拷贝
		//return clone $this;
	
		//深拷贝
		$serialize_obj = serialize($this);//序列化
		$clone_obj = unserialize($serialize_obj);//反序列化
		return $clone_obj;
	}
}

//测试拷贝的类
class Test{
	public $array;
}


//客户端
class Client{
   /**
   * 实现原型模式
   * 
   * @return string 取出数据
   */
	public static function main(){
		//浅拷贝
		//$pro = new ConcretePrototype('prototype');
		//$pro2 = $pro->copy();
		//echo '1:',$pro->getName(),PHP_EOL,'2:',$pro2->getName(),PHP_EOL;
	
		//深拷贝
		$test = new Test();
		$test->array = array('a','b','c','d');
		$pro1 = new ConcretePrototype($test);
		$pro2 = $pro1->copy();

		var_export($pro1->getName());
		var_export($pro2->getName());
	}
}

Client::main();
