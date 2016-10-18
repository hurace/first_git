<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-18
 * Time: 16:46
 */
namespace  DesignPatterns\Chapter7\Program3;

interface GiveGift{
    public function GiveDolls();
    public function GiveFlowers();
    public function GiveChocolate();
}

class Proxy implements GiveGift{
    protected $gg;
    public function __construct(SchoolGirl $mm){
        $this->gg = new Pursuit($mm);
    }

    public function GiveDolls(){
        $this->gg->GiveDolls();
    }

    public function GiveFlowers(){
        $this->gg->GiveFlowers();
    }

    public function GiveChocolate(){
        $this->gg->GiveChocolate();
    }
}

class Pursuit implements GiveGift{
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

        $daili = new Proxy($jiaojiao);

        $daili->GiveDolls();
        $daili->GiveFlowers();
        $daili->GiveChocolate();
    }
}

Program::main();