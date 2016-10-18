<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-18
 * Time: 15:02
 */
namespace DesignPatterns\Chapter6\Program4;

class Person{
    private $_name;

    public function __construct($name){
        $this->_name = $name;
    }

    public function Show(){
        echo '装扮的',$this->_name;
    }
}

class Finery extends Person{
    protected $component;
    public function Decorate(Person $component){
        $this->component = $component;
    }

    public function Show(){
        if($this->component != null){
            $this->component->Show();
        }
    }
}

//大T恤
class TShirts extends Finery{
    public function Show(){
        echo '大T恤 ';
        parent::Show();
    }
}

//垮裤
class BigTrouser extends Finery{
    public function Show(){
        echo '垮裤 ';
        parent::Show();
    }
}

//破球鞋
class Sneakers extends Finery{
    public function Show(){
        echo '破球鞋 ';
        parent::Show();
    }
}

//西装
class Suit extends Finery{
    public function Show(){
        echo '西装 ';
        parent::Show();
    }
}

//领带
class Tie extends Finery{
    public function Show(){
        echo '领带 ';
        parent::Show();
    }
}

//皮鞋
class LeatherShoes extends Finery{
    public function Show(){
        echo '皮鞋 ';
        parent::Show();
    }
}

class Program{
    public static function main(){
        $xc = new Person('小菜');

        echo PHP_EOL,'小菜的第一种装扮：';

        $pqx = new Sneakers();
        $kk = new BigTrouser();
        $dtx = new TShirts();

        $pqx->Decorate($xc);
        $kk->Decorate($pqx);
        $dtx->Decorate($kk);
        $dtx->Show();

        echo PHP_EOL,'小菜的第二种装扮：';
        $px = new LeatherShoes();
        $ld = new Tie();
        $xz = new Suit();

        $px->Decorate($xc);
        $ld->Decorate($px);
        $xz->Decorate($ld);
        $xz->Show();
    }
}

Program::main();