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

class Ioc{
    protected static $registry = [];

    public static function bind($name, Callable $resolver){
        static::$registry[$name] = $resolver;
    }

    public static function make($name){
        if(isset(static::$registry[$name])){
            $resolver = static::$registry[$name];
            return $resolver();
        }
        throw new \Exception('Alias does not exist in the IoC registry.');
    }
}

Ioc::bind('bim', function(){
    return new Bim();
});

Ioc::bind('bar', function(){
    return new Bar(Ioc::make('bim'));
});

Ioc::bind('foo', function(){
    return new Foo(Ioc::make('bar'));
});

$foo = Ioc::make('foo');
$foo->doSomething();