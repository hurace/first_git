<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-03
 * Time: 17:18
 */
namespace DesignPatterns\Chapter26\Basic;

class FlyweightFactory{
    private $_flyweights = array();

    public function __construct(){
        $this->_flyweights['X'] = new ConcreteFlyweight();
        $this->_flyweights['Y'] = new ConcreteFlyweight();
        $this->_flyweights['Z'] = new ConcreteFlyweight();
    }

    public function GetFlyweight($key){
        return $this->_flyweights[$key];
    }
}

abstract class Flyweight{
    public abstract function Operation($extrinsicstate);
}

class ConcreteFlyweight extends Flyweight{
    public function Operation($extrinsicstate){
        echo '具体Flyweight:' , $extrinsicstate , PHP_EOL;
    }
}

class UnsharedConcreteFlyweight extends Flyweight{
    public function Operation($extrinsicstate){
        echo '不共享的具体Flyweight:' , $extrinsicstate , PHP_EOL;
    }
}

class Program{
    public static function main(){
        $extrinsicstate = 22;

        $f = new FlyweightFactory();

        $fx = $f->GetFlyweight('X');
        $fx->Operation(--$extrinsicstate);

        $fx = $f->GetFlyweight('Y');
        $fx->Operation(--$extrinsicstate);

        $fx = $f->GetFlyweight('Z');
        $fx->Operation(--$extrinsicstate);

        $uf = new UnsharedConcreteFlyweight();

        $uf->Operation(--$extrinsicstate);
    }
}

Program::main();