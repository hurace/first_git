<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-18
 * Time: 14:32
 */
namespace DesignPatterns\Chapter6\Program3;

abstract class Component{
    public abstract function Operation();
}

class ConcreteComponent extends Component{
    public function Operation(){
        echo 'ConcreteComponent:具体对象的操作',PHP_EOL;
    }
}

abstract class Decorator extends Component{
    protected $component;

    public function SetComponent(Component $component){
        $this->component = $component;
    }

    public function Operation(){
        if($this->component != null){
            $this->component->Operation();
        }
    }
}

class ConcreteDecoratorA extends Decorator{
    private $_addedState;

    public function Operation(){
        parent::Operation();
        $this->_addedState = 'New State';
        echo 'ConcreteDecoratorA:具体装饰对象A的操作',PHP_EOL;
    }
}

class ConcreteDecoratorB extends Decorator{
    public function Operation(){
        parent::Operation();
        $this->AddedBehavior();
        echo 'ConcreteDecoratorA:具体装饰对象A的操作',PHP_EOL;
    }

    public function AddedBehavior(){
        echo 'AddedBehavior...',PHP_EOL;
    }
}

class Program{
    public static function main(){
        $c = new ConcreteComponent();
        $A = new ConcreteDecoratorA();
        $B = new ConcreteDecoratorB();

        $A->SetComponent($c);
        $B->SetComponent($A);

        $B->Operation();
    }
}

Program::main();