<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-01
 * Time: 15:04
 */
namespace DesignPatterns\Chapter20\Basic;

class Abstraction{
    protected $implementor;

    public function SetImplementor(Implementor $implementor){
        $this->implementor = $implementor;
    }

    public function Operation(){
        $this->implementor->Operation();
    }
}

class RefinedAbstraction extends Abstraction{
    public function Operation(){
        $this->implementor->Operation();
    }
}

abstract class Implementor{
    public abstract function Operation();
}

class ConcreteImplementorA extends Implementor{
    public function Operation(){
        echo '具体实现A的方法执行' , PHP_EOL;
    }
}

class ConcreteImplementorB extends Implementor{
    public function Operation(){
        echo '具体实现B的方法执行' , PHP_EOL;
    }
}

class Program{
    public static function main(){
        $ab = new RefinedAbstraction();

        $ab->SetImplementor(new ConcreteImplementorA());
        $ab->Operation();

        $ab->SetImplementor(new ConcreteImplementorB());
        $ab->Operation();
    }
}

Program::main();