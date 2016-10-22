<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-22
 * Time: 10:57
 */
namespace DesignPatterns\Chapter14\Program1;

//前台秘书类
class Secretary{
    //同事列表
    private $_observers = array();
    private $_action;

    //增加
    public function Attach(StockObserver $observer){
        array_push($this->_observers,$observer);
    }

    //减少
    public function Detach(StockObserver $observer){
        array_pop($observer);
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

//看股票的同事
class StockObserver{
    private $_name;
    private $_sub;

    public function __construct($name,Secretary $sub){
        $this->_name = $name;
        $this->_sub = $sub;
    }

    public function Update(){
        echo $this->_sub->getAction(),$this->_name,'关闭股票行情，继续工作！',PHP_EOL;
    }
}

class Program{
    public static function main(){
        //前台小姐童子喆
        $tongzizhe = new Secretary();
        //看股票的同事
        $tongshi1 = new StockObserver('魏关姹',$tongzizhe);
        $tongshi2 = new StockObserver('易管查',$tongzizhe);

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