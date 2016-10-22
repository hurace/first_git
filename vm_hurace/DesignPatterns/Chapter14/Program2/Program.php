<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-22
 * Time: 11:18
 */
namespace DesignPatterns\Chapter14\Program2;

//前台秘书类
class Secretary{
    //同事列表
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

    public function __construct($name,Secretary $sub){
        $this->name = $name;
        $this->sub = $sub;
    }

    public abstract function Update();
}

//看股票的同事
class StockObserver extends Observer{
    public function __construct($name, Secretary $sub){
        parent::__construct($name, $sub);
    }

    public function Update(){
        echo $this->sub->getAction(),$this->name,'关闭股票行情，继续工作！',PHP_EOL;
    }
}

//看NBA的同事
class NBAObserver extends Observer{
    public function __construct($name, Secretary $sub){
        parent::__construct($name, $sub);
    }

    public function Update(){
        echo $this->sub->getAction(),$this->name,'关闭NBA直播，继续工作！',PHP_EOL;
    }
}

class Program{
    public static function main(){
        //前台小姐童子喆
        $tongzizhe = new Secretary();
        //看股票的同事
        $tongshi1 = new StockObserver('魏关姹',$tongzizhe);
        //看NBA的同事
        $tongshi2 = new NBAObserver('易管查',$tongzizhe);

        //前台记下了两位同事
        $tongzizhe->Attach($tongshi1);
        $tongzizhe->Attach($tongshi2);

        //发现老板回来
        $tongzizhe->setAction('老板回来了');
        //通知两个同事
        $tongzizhe->Notify();
    }
}

Program::main();