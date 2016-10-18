<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-18
 * Time: 16:47
 */
namespace DesignPatterns\Chapter7\Program4;

abstract class Subject{
    public abstract function Request();
}

class RealSubject extends Subject{
    public function Request(){
        echo '真实的请求',PHP_EOL;
    }
}

class Proxy extends Subject{
    protected $realSubject;
    public function Request(){
        if(null == $this->realSubject){
            $this->realSubject = new RealSubject();
        }
        $this->realSubject->Request();
    }
}

class Program{
    public static function main(){
        $proxy = new Proxy();
        $proxy->Request();
    }
}

Program::main();