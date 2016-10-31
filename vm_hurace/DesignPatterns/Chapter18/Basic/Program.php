<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-31
 * Time: 14:30
 */
namespace DesignPatterns\Chapter18\Basic;

class Originator{
    private $_state;
    public function setState($state){
        $this->_state = $state;
    }

    public function getState(){
        return $this->_state;
    }

    public function CreateMemento(){
        return new Memento($this->_state);
    }

    public function SetMemento(Memento $memento){
        $this->_state = $memento->State();
    }

    public function Show(){
        echo 'State=',$this->_state,PHP_EOL;;
    }
}

class Memento{
    private $_state;
    public function __construct($state){
        $this->_state = $state;
    }

    public function State(){
        return $this->_state;
    }
}

class Caretaker{
    private $_memento;
    public function setMemento($memento){
        $this->_memento = $memento;
    }

    public function getMemento(){
        return $this->_memento;
    }
}

class Program{
    public static function main(){
        $o = new Originator();
        $o->setState('On');
        $o->Show();

        $c = new Caretaker();
        $c->setMemento($o->CreateMemento());

        $o->setState('Off');
        $o->Show();

        $o->SetMemento($c->getMemento());
        $o->Show();
    }
}

Program::main();