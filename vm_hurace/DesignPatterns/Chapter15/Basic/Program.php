<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-24
 * Time: 15:08
 */
namespace DesignPatterns\Chapter15\Basic;

abstract class AbstraceFactory{
    public abstract function CreateProductA();
    public abstract function CreateProductB();
}

class ConcreteFactory1 extends AbstraceFactory{
    public function CreateProductA(){
        return new ProductA1();
    }

    public function CreateProductB(){
        return new ProductB1();
    }
}

class ConcreteFactory2 extends AbstraceFactory{
    public function CreateProductA(){
        return new ProductA2();
    }

    public function CreateProductB(){
        return new ProductB2();
    }
}

abstract class AbstractProductA{

}

abstract class AbstractProductB{
    public abstract function Interact(AbstractProductA $a);
}

class ProductA1 extends AbstractProductA{

}

class ProductB1 extends AbstractProductB{
    public function Interact(AbstractProductA $a){
        echo ' interacts with ',PHP_EOL;
    }
}

class ProductA2 extends AbstractProductA{

}

class ProductB2 extends AbstractProductB{
    public function Interact(AbstractProductA $a){
        echo '----------',PHP_EOL;
    }
}

class Client{
    private $AbstractProductA;
    private $AbstractProductB;

    public function __construct(AbstraceFactory $factory){
        $this->AbstractProductA = $factory->CreateProductA();
        $this->AbstractProductB = $factory->CreateProductB();
    }

    public function Run(){
        $this->AbstractProductB->Interact($this->AbstractProductA);
    }
}

class Program{
    public static function main(){
        $factory1 = new ConcreteFactory1();
        $c1 = new Client($factory1);
        $c1->Run();

        $factory2 = new ConcreteFactory2();
        $c2 = new Client($factory2);
        $c2->Run();
    }
}

Program::main();