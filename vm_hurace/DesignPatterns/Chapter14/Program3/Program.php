<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-22
 * Time: 11:43
 */
namespace DesignPatterns\Chapter14\Program3;

//通知者接口
use DesignPatterns\Chapter6\Program2\BigTrouser;

interface Subject{
    public function Attach(Observer $observer);
    public function Detach(Observer $observer);
    public function Notify();
    public function getAction();
    public function setAction($value);
}

//前台秘书类
class Secretary implements Subject{
    private $_observers = array();
    private $_action;

    //增加
    public function Attach(Observer $observer){
        array_push($this->_observers,$observer);
    }

    //减少
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

    //前台状态
    /*public function SecretaryAction(){

    }*/
    public function getAction(){
        return $this->_action;
    }

    public function setAction($value){
        $this->_action = $value;
    }
}

//老板胡汉三
class Boss implements Subject{
    private $_observers = array();
    private $_action;

    //增加
    public function Attach(Observer $observer){
        array_push($this->_observers,$observer);
    }

    //减少
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

    //前台状态
    /*public function SecretaryAction(){

    }*/
    public function getAction(){
        return $this->_action;
    }

    public function setAction($value){
        $this->_action = $value;
    }
}

//抽象观察者
abstract class Observer{
    protected $name;
    protected $sub;

    public function __construct($name,Subject $sub){
        $this->name = $name;
        $this->sub = $sub;
    }

    public abstract function Update();
}

//看股票的同事
class StockObserver extends Observer{
    public function __construct($name, Subject $sub){
        parent::__construct($name, $sub);
    }

    public function Update(){
        echo $this->sub->getAction(),$this->name,'关闭股票行情，继续工作！',PHP_EOL;
    }
}

//看NBA的同事
class NBAObserver extends Observer{
    public function __construct($name, Subject $sub){
        parent::__construct($name, $sub);
    }

    public function Update(){
        echo $this->sub->getAction(),$this->name,'关闭NBA直播，继续工作！',PHP_EOL;
    }
}

class Program{
    public static function main(){
        //老板胡汉三
        $huhansan = new Boss();

        //看股票的同事
        $tongshi1 = new StockObserver('魏关姹',$huhansan);
        //看NBA的同事
        $tongshi2 = new NBAObserver('易管查',$huhansan);

        $huhansan->Attach($tongshi1);
        $huhansan->Attach($tongshi2);

        $huhansan->Detach($tongshi2);

        //老板回来
        $huhansan->setAction('我胡汉三回来了');

        //发出通知
        $huhansan->Notify();
    }
}

Program::main();