<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-09
 * Time: 12:22
 */
namespace DI\Program1;

class Bim{
    public function doSomething(){
        echo __METHOD__ , '|';
    }
}

class Bar{
    public function doSomething(){
        $bim = new Bim();
        $bim->doSomething();
        echo __METHOD__ , '|';
    }
}

class Foo{
    public function doSomething(){
        $bar = new Bar();
        $bar->doSomething();
        echo __METHOD__ , '|';
    }
}

$foo = new Foo();
$foo->doSomething();