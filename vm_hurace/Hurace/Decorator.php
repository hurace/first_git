<?php
//被装饰者基类
interface Component{
	public function operator();
}

//装饰者基类
abstract class Decorator implements Component{
	protected $component;

	public function __construct(Component $component){
		$this->component = $component;
	}
	
	public function operator(){
		$this->component->operator();
	}
}

 
//具体装饰者类
class ConcreteDecorator implements Component{
	public function operator(){
		echo 'do operator...',PHP_EOL;
	}
}

class ConcreteDecoratorA extends Decorator{
	public function __construct(Component $component){
		parent::__construct($component);
	}

	public function operator(){
		parent::operator();
		$this->addOperator();//新增加的操作
	}

	public function addOperator(){
		echo 'add Operator A...',PHP_EOL;
	}
}

class ConcreteDecoratorB extends Decorator{
	public function __construct(Component $component){
		parent::__construct($component);
	}

	public function operator(){
		parent::operator();
		$this->addOperator();
	}

	public function addOperator(){
		echo 'add Operator B...',PHP_EOL;
	}
}

class Client{
	public static function main(){
		$decoratorA = new ConcreteDecoratorA(new ConcreteDecorator());
		$decoratorA->operator();


		$decoratorB = new ConcreteDecoratorB($decoratorA);
		$decoratorB->operator();
	}
}

Client::main();

