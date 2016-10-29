<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-29
 * Time: 10:57
 */
namespace DesignPatterns\Chapter17\Basic;

class Target{
    public function Request(){
        echo '普通请求',PHP_EOL;
    }
}

class Adaptee{
    public function SpecialRequest(){
        echo '特殊请求',PHP_EOL;
    }
}

class Adapter extends Target{
    private $_adaptee;

    public function __construct(){
        $this->_adaptee = new Adaptee();
    }

    public function Request(){
        $this->_adaptee->SpecialRequest();
    }
}

class Program{
    public static function main(){
        $target = new Adapter();
        $target->Request();
    }
}

Program::main();