<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-18
 * Time: 17:16
 */
namespace DesignPatterns\Chapter8\Program1;

class Operation{
    private $_numberA;
    private $_numberB;
    public $resule = 0;

    public function __set($name, $value){
       $this->$name = $value;
    }

    public function __get($name){
       if(isset($this->$name)){
           return $this->$name;
       }else{
           return null;
       }
    }

    //得到运算结果
    public function GetResult(){
        return $this->result;
    }
}

// 加法类
class OperatorAdd extends Operation{
    public function GetResult(){
        return $this->_numberA + $this->_numberB;
    }
}

// 减法类
class OperatorSub extends Operation{
    public function GetResult(){
        return $this->_numberA - $this->_numberB;
    }
}

// 乘法类
class OperatorMul extends Operation{
    public function GetResult(){
        return $this->_numberA * $this->_numberB;
    }
}

// 除法类
class OperatorDiv extends Operation{
    public function GetResult(){
        try{
            if(0 == $this->_numberB)
                throw new \Exception('除数不能为0');
            return $this->_numberA / $this->_numberB;
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}

// 工厂方法
interface IFactory{
    public function CreateOperation();
}

// 专门负责生产“+”的工厂
class AddFactory implements IFactory{
    public function CreateOperation(){
        return new OperatorAdd();
    }
}

// 专门负责生产“-”的工厂
class SubFactory implements IFactory{
    public function CreateOperation(){
        return new OperatorSub();
    }
}

// 专门负责生产“-”的工厂
class MulFactory implements IFactory{
    public function CreateOperation(){
        return new OperatorMul();
    }
}

// 专门负责生产“-”的工厂
class DivFactory implements IFactory{
    public function CreateOperation(){
        return new OperatorDiv();
    }
}

class Program{
    public static function main(){
        /*$add = new AddFactory();
        $oper = $add->CreateOperation();

        $oper->_numberA = 1;
        $oper->_numberB = 2;

        echo $oper->GetResult(),PHP_EOL;*/

        $div = new DivFactory();
        $oper = $div->CreateOperation();

        $oper->_numberA = 1;
        $oper->_numberB = 0;

        echo $oper->GetResult();
    }
}

Program::main();