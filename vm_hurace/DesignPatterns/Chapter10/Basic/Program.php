<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-20
 * Time: 17:43
 */
namespace DesignPatterns\Chapter10\Basic;

abstract class AbstraceClass{
    public abstract function PrimitiveOperation1();
    public abstract function PrimitiveOperation2();

    public function TemplateMethod(){
        $this->PrimitiveOperation1();
        $this->PrimitiveOperation2();
    }
}

class ConcreteClassA extends AbstraceClass{
    public function PrimitiveOperation1(){
        echo '具体类A方法1实现',PHP_EOL;
    }

    public function PrimitiveOperation2(){
        echo '具体类A方法2实现',PHP_EOL;
    }
}

class ConcreteClassB extends AbstraceClass{
    public function PrimitiveOperation1(){
        echo '具体类B方法1实现',PHP_EOL;
    }

    public function PrimitiveOperation2(){
        echo '具体类B方法2实现',PHP_EOL;
    }
}

class Program{
    public static function main(){
        $c = new ConcreteClassA();
        $c->TemplateMethod();

        $c = new ConcreteClassB();
        $c->TemplateMethod();
    }
}

Program::main();