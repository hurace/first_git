<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-22
 * Time: 12:15
 */
namespace DesignPatterns\Chapter14\Basic;

abstract class Subject{
    private $_observers = array();
    //增加观察者
    public function Attach(Observer $observer){
        array_push($this->_observers,$observer);
    }

    //移除观察者
    public function Detach(Observer $observer){
        foreach ($this->_observers as $key => $_observer) {
            if($observer == $_observer){
                unset($this->_observers[$key]);
            }
        }
        $this->_observers = array_values($this->_observers);//重新索引数组
    }

    //通知
    public function Notify(){
        foreach ($this->_observers as $observer) {
            $observer->Update();
        }
    }
}

//具体通知者
class ConcreteSubject extends Subject{
    private $_action;

    public function getAction()
    {
        return $this->_action;
    }

    public function setAction($value){
        $this->_action = $value;
    }
}

abstract class Observer{
    public abstract function Update();
}

class ConcrtetObserver extends Observer{
    private $_name;
    private $_action;
    private $_sub;

    public function __construct(ConcreteSubject $sub,$name){
        $this->_sub = $sub;
        $this->_name = $name;
    }

    public function Update(){
        $this->_action = $this->_sub->getAction();
        echo '观察者',$this->_name,'的状态是',$this->_action,PHP_EOL;
    }

    public function getSub(){
        return $this->_sub;
    }

    public function setSub($sub){
        $this->_sub = $sub;
    }
}

class Program{
    public static function main(){
        $s = new ConcreteSubject();

        $s->Attach(new ConcrtetObserver($s, 'X'));
        $s->Attach(new ConcrtetObserver($s, 'Y'));
        $s->Attach(new ConcrtetObserver($s, 'Z'));

        $s->setAction('ABC');
        $s->Notify();
    }
}

Program::main();