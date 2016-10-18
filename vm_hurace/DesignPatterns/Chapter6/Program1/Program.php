<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-18
 * Time: 11:16
 */

namespace DesignPatterns\Chapter6\Program1;

class Person{
    private $_name;

    public function __construct($name){
        $this->_name = $name;
    }

    public function WearTShirts(){
        echo '大T恤 ';
    }

    public function WearBigTrouser(){
        echo '垮裤 ';
    }

    public function WearSneakers(){
        echo '破球鞋 ';
    }

    public function WearSuit(){
        echo '西裤 ';
    }

    public function WearTie(){
        echo '领带 ';
    }

    public function WearLeatherShoes(){
        echo '皮鞋 ';
    }

    public function show(){
        echo '装扮的',$this->_name;
    }
}

class Program{
    public static function main(){
        $person = new Person('小菜');

        echo '第一种装扮：';
        $person->WearTShirts();
        $person->WearBigTrouser();
        $person->WearSneakers();
        $person->show();

        echo '第二种装扮：';
        $person->WearSuit();
        $person->WearTie();
        $person->WearSneakers();
        $person->show();
    }
}

Program::main();