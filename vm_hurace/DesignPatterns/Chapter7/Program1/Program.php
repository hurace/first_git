<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-18
 * Time: 16:24
 */
namespace DesignPatterns\Chapter7\Program1;

//追求者
class Pursuit{
    protected $mm;
    public function __construct(SchoolGirl $mm){
        $this->mm = $mm;
    }

    public function GiveDolls(){
        echo $this->mm->getName(),'送你洋娃娃',PHP_EOL;
    }

    public function GiveFlowers(){
        echo $this->mm->getName(),'送你鲜花',PHP_EOL;
    }

    public function GiveChocolate(){
        echo $this->mm->getName(),'送你巧克力',PHP_EOL;
    }
}

//被追求者
class SchoolGirl{
    private $_name;
    public function setName($name){
        $this->_name = $name;
    }
    public function getName(){
        return $this->_name;
    }
}

class Program{
    public static function main(){
        $jiaojiao = new SchoolGirl();
        $jiaojiao->setName('李娇娇');

        $zhuojiayi = new Pursuit($jiaojiao);

        $zhuojiayi->GiveDolls();
        $zhuojiayi->GiveFlowers();
        $zhuojiayi->GiveChocolate();
    }
}

Program::main();