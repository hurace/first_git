<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/19
 * Time: 22:11
 */
namespace DesignPatterns\Chapter9\Basic;

abstract class Prototype{
    private $_id;

    public function __construct($id){
        $this->_id = $id;
    }

    public function __get($name){
        return $this->_id;
    }
}

class ConcretePrototype1 extends Prototype{
    public function __construct($id){
        parent::__construct($id);
    }
}

class ConcretePrototype2 extends Prototype{
    public function __construct($id){
        parent::__construct($id);
    }
}

class Program{
    public static function main(){
        $p1 = new ConcretePrototype1('I');
        $c1 = clone $p1;
        echo 'Cloned:',$c1->_id,PHP_EOL;

        $p2 = new ConcretePrototype2('II');
        $c2 = clone $p2;
        echo 'Cloned:',$c2->_id,PHP_EOL;
    }
}

Program::main();