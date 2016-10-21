<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-21
 * Time: 14:52
 */
namespace DesignPatterns\Chapter12\Basic;

class SubSystemOne{
    public function MethodOne(){
        echo '子系统方法一',PHP_EOL;
    }
}

class SubSystemTwo{
    public function MethodTwo(){
        echo '子系统方法二',PHP_EOL;
    }
}

class SubSystemThree{
    public function MethodThree(){
        echo '子系统方法三',PHP_EOL;
    }
}

class SubSystemFour{
    public function MethodFour(){
        echo '子系统方法四',PHP_EOL;
    }
}

class Facade{
    protected $one;
    protected $two;
    protected $three;
    protected $four;

    public function __construct(){
        $this->one = new SubSystemOne();
        $this->two = new SubSystemTwo();
        $this->three = new SubSystemThree();
        $this->four = new SubSystemFour();
    }

    public function MethodA(){
        echo '方法组A() ---- ',PHP_EOL;
        $this->one->MethodOne();
        $this->two->MethodTwo();
        $this->four->MethodFour();
    }

    public function MethodB(){
        echo '方法组B() ---- ',PHP_EOL;
        $this->two->MethodTwo();
        $this->three->MethodThree();
    }
}

class Program{
    public static function main(){
        $facade = new Facade();

        $facade->MethodA();
        $facade->MethodB();
    }
}

Program::main();