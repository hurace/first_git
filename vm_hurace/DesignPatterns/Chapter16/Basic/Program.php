<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-28
 * Time: 16:14
 */
namespace DesignPatterns\Chapter16\Basic;


class Context{
    private $State;

    public function __construct(State $state){
        $this->State = $state;
    }

    public function setState($state){
        echo '当前状态',PHP_EOL;
        $this->State = $state;
    }

    public function getState(){
        return $this->State;
    }

    public function Request(){
        $this->State->Handle($this);
    }


}
abstract class State{
    public abstract function Handle(Context $context);
}

class ConcreteStateA extends State{
    public function Handle(Context $context){
        $context->setState(new ConcreteStateB());
    }
}

class ConcreteStateB extends State{
    public function Handle(Context $context){
        $context->setState(new ConcreteStateA());
    }
}

class Program{
    public static function main(){
        $c = new Context(new ConcreteStateA());
        $c->Request();
        $c->Request();
        $c->Request();
        $c->Request();
    }
}

Program::main();