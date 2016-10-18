<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-18
 * Time: 11:56
 */

namespace DesignPatterns\Chapter6\Program2;

class Person{
    private $_name;
    public function __construct($name){
        $this->_name = $name;
    }

    public function show(){
        echo '装扮的',$this->_name;
    }
}

//服饰
abstract class Finery{
    public abstract function Show();
}

//大T恤
class TShirts extends Finery{
    public function Show(){
        echo '大T恤 ';
    }
}

//垮裤
class BigTrouser extends Finery{
    public function Show(){
        echo '垮裤 ';
    }
}

//破球鞋
class Sneakers extends Finery{
    public function Show(){
        echo '破球鞋 ';
    }
}

//西装
class Suit extends Finery{
    public function Show(){
        echo '西装 ';
    }
}

//领带
class Tie extends Finery{
    public function Show(){
        echo '领带 ';
    }
}

//皮鞋
class LeatherShoes extends Finery{
    public function Show(){
        echo '皮鞋 ';
    }
}

class Program{
    public static function main(){
        $person = new Person('小菜');

        echo PHP_EOL,'第一种装扮:';
        $dtx = new TShirts();
        $kk = new BigTrouser();
        $pqx = new Sneakers();

        $dtx->Show();
        $kk->Show();
        $pqx->Show();
        $person->show();

        echo PHP_EOL,'第二种装扮:';
        $xz = new Suit();
        $ld = new Tie();
        $px = new LeatherShoes();

        $xz->Show();
        $ld->Show();
        $px->Show();
        $person->show();
    }
}

Program::main();