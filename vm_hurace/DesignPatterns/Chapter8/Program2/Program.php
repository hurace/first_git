<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-18
 * Time: 18:15
 */
namespace DesignPatterns\Chapter8\Program2;

//雷锋
class LeiFeng{
    public function Sweep(){
        echo '扫地',PHP_EOL;
    }

    public function Wash(){
        echo '洗衣',PHP_EOL;
    }

    public function BuyRice(){
        echo '买米',PHP_EOL;
    }
}

//学雷锋的大学生
class Undergraduate extends LeiFeng{

}

//社区志愿者
class Volunteer extends LeiFeng{

}

//简单雷锋工厂
class SimpleFactory{
    protected $result;
    public function CreteLeiFeng($type){
        switch($type){
            case '学雷锋的大学生':
                $this->result = new Undergraduate();
                break;
            case '社区志愿者':
                $this->result = new Volunteer();
                break;
        }
        return $this->result;
    }
}

//雷锋工厂
interface IFactory{
    public function CreateLeiFeng();
}

//学雷锋的大学生工厂
class UndergraduateFactory implements IFactory{
    public function CreateLeiFeng(){
        return new Undergraduate();
    }
}

//社区志愿者工厂
class VolunteerFactory implements IFactory{
    public function CreateLeiFeng(){
        return new Volunteer();
    }
}

class Program{
    public static function main(){

        //基本方式:薛磊风代表大学生学习雷锋
        $xueleifeng = new Undergraduate();

        $xueleifeng->BuyRice();
        $xueleifeng->Sweep();
        $xueleifeng->Wash();

        $student1 = new Undergraduate();
        $student1->Wash();
        $student2 = new Undergraduate();
        $student2->Sweep();
        $student3 = new Undergraduate();
        $student3->BuyRice();

        //简单工厂模式
        $simple = new SimpleFactory();
        $studentA = $simple->CreteLeiFeng('学雷锋的大学生');
        $studentA->Wash();
        $studentB = $simple->CreteLeiFeng('学雷锋的大学生');
        $studentB->Sweep();
        $studentC = $simple->CreteLeiFeng('学雷锋的大学生');
        $studentC->BuyRice();

        //工厂方法模式
        $factory = new UndergraduateFactory();
        $student = $factory->CreateLeiFeng();

        $student->Wash();
        $student->Sweep();
        $student1->BuyRice();
    }
}

Program::main();