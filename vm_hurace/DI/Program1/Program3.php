<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-09
 * Time: 12:31
 */
namespace DI\Program1;

class Bim{
    public function doSomething(){
        echo __METHOD__ , '|';
    }
}

class Bar{
    private $_bim;
    public function __construct(Bim $bim){
        $this->_bim = $bim;
    }

    public function doSomething(){
        $this->_bim->doSomething();
        echo __METHOD__ , '|';
    }
}

class Foo{
    private $_bar;
    public function __construct(Bar $bar){
        $this->_bar = $bar;
    }

    public function doSomething(){
        $this->_bar->doSomething();
        echo __METHOD__ , '|';
    }
}

class Container{
    private $_s = array();

    public function __set($k, $c){
        $this->_s[$k] = $c;
    }

    public function __get($name){
        return $this->_s[$name]($this);
    }
}

$c = new Container();

$c->bim = function(){
    return new Bim();
};

$c->bar = function($c){
    return new Bar($c->bim);
};

$c->foo = function($c){
    return new Foo($c->bar);
};

$foo = $c->foo;
$foo->doSomething();