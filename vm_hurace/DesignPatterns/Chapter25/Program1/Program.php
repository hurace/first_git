<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-03
 * Time: 11:27
 */
namespace DesignPatterns\Chapter25\Program1;

//联合国机构
abstract class UnitedNations{
    public abstract function myDeclare($message, Country $colleague);
}

//联合国安全理事会
class UnitedNationsSecurityCouncil extends UnitedNations{
    private $_colleague1;
    private $_colleague2;

    public function SetColleague1($value){
        $this->_colleague1 = $value;
    }

    public function SetColleague2($value){
        $this->_colleague2 = $value;
    }

    public function myDeclare($message, Country $colleague){
        if($colleague == $this->_colleague1){
            $this->_colleague2->GetMessage($message);
        }else{
            $this->_colleague1->GetMessage($message);
        }
    }
}

//国家
abstract class Country{
    protected $_mediator;
    public function __construct(UnitedNations $nations){
        $this->_mediator = $nations;
    }
}

//美国
class USA extends Country{
    public function __construct(UnitedNations $nations){
        parent::__construct($nations);
    }

    //声明
    public function myDeclare($message){
        $this->_mediator->myDeclare($message, $this);
    }

    //获得消息
    public function GetMessage($message){
        echo '美国获得对方信息：' , $message , PHP_EOL;
    }
}

//伊拉克
class Iraq extends Country{
    public function __construct(UnitedNations $nations){
        parent::__construct($nations);
    }

    //声明
    public function myDeclare($message){
        $this->_mediator->myDeclare($message, $this);
    }

    //获得消息
    public function GetMessage($message){
        echo '伊拉克获得对方信息：' , $message , PHP_EOL;
    }
}

class Program{
    public static function main(){
        $unsc = new UnitedNationsSecurityCouncil();

        $c1 = new USA($unsc);
        $c2 = new Iraq($unsc);

        $unsc->SetColleague1($c1);
        $unsc->SetColleague2($c2);

        $c1->myDeclare('不准研制核武器，否则要发动战争！');
        $c2->myDeclare('我们没有核武器，也不怕侵略。');
    }
}

Program::main();