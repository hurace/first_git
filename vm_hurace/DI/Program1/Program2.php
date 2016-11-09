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

$foo = new Foo(new Bar(new Bim()));
$foo->doSomething();