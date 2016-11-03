<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-03
 * Time: 10:37
 */
namespace DesignPatterns\Chapter25\Basic;

abstract class Mediator{
    public abstract function Send($message, Colleague $colleague);
}

class ConcreteMediator extends Mediator{
    private $_colleague1;
    private $_colleague2;

    public function SetColleague1($value){
        $this->_colleague1 = $value;
    }

    public function SetColleague2($value){
        $this->_colleague2 = $value;
    }

    public function Send($message, Colleague $colleague){
        if($colleague == $this->_colleague1){
            $this->_colleague2->Notify($message);
        }else{
            $this->_colleague1->Notify($message);
        }
    }
}

abstract class Colleague{
    protected $mediator;
    public function __construct(Mediator $mediator){
        $this->mediator = $mediator;
    }
}

class ConcreteColleague1 extends Colleague{
    public function __construct(Mediator $mediator){
        parent::__construct($mediator);
    }

    public function Send($message){
        $this->mediator->Send($message, $this);
    }

    public function Notify($message){
        echo '同事1得到信息' , $message;
    }
}

class ConcreteColleague2 extends Colleague{
    public function __construct(Mediator $mediator){
        parent::__construct($mediator);
    }

    public function Send($message){
        $this->mediator->Send($message, $this);
    }

    public function Notify($message){
        echo '同事2得到信息' , $message;
    }
}

class Program{
    public static function main(){
        $m = new ConcreteMediator();

        $c1 = new ConcreteColleague1($m);
        $c2 = new ConcreteColleague2($m);

        $m->SetColleague1($c1);
        $m->SetColleague2($c2);

        $c1->Send('吃过饭了么？');
        $c2->Send('没有呢，你打算请客？');
    }
}

Program::main();