<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-09
 * Time: 12:31
 */
//namespace DI\Program1;

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
//        return $this->_s[$name]($this);
        return $this->build($this->_s[$name]);
    }

    /**
     * 自动绑定（Autowiring）自动解析（Automatic Resolution）
     *
     * @param string $className
     * @return object
     * @throws Exception
     */
    public function build($className){
        // 如果是匿名函数（Anonymous functions），也叫闭包函数（closures）
        if($className instanceof \Closure){
            // 执行闭包函数，并将结果返回
            return $className($this);
        }

        /** @var ReflectionClass $reflector */
        $reflector = new \ReflectionClass($className);

        // 检查类是否可实例化, 排除抽象类abstract和对象接口interface
        if(!$reflector->isInstantiable()){
            throw new \Exception('Can\'t instantiate this.');
        }

        /** @var ReflectionMethod $constructor 获取类的构造函数 */
        $constructor = $reflector->getConstructor();

        // 若无构造函数，直接实例化并返回
        if(is_null($constructor)){
            return new $className;
        }

        // 取构造函数参数,通过 ReflectionParameter 数组返回参数列表
        $parameters = $constructor->getParameters();

        // 递归解析构造函数的参数
        $dependencies = $this->getDependencies($parameters);

        // 创建一个类的新实例，给出的参数将传递到类的构造函数。
        return $reflector->newInstanceArgs($dependencies);
    }

    /**
     * @param array $parameters
     * @return array
     * @throws Exception
     */
    public function getDependencies($parameters){
        $dependencies = [];

        /** @var ReflectionParameter $parameter */
        foreach($parameters as $parameter){
            /** @var ReflectionClass $dependency */
            $dependency = $parameter->getClass();

            if(is_null($dependency)){
                // 是变量,有默认值则设置默认值
                $dependencies[] = $this->resolveNonClass($parameter);
            }else{
                // 是一个类，递归解析
                $dependencies[] = $this->build($dependency->name);
            }
        }
        return $dependencies;
    }

    /**
     * @param ReflectionParameter $parameter
     * @return mixed
     * @throws Exception
     */
    public function resolveNonClass($parameter){
        // 有默认值则返回默认值
        if($parameter->isDefaultValueAvailable()){
            return $parameter->getDefaultValue();
        }
        throw new \Exception('I have no idea what to do here.');
    }
}


// ---
$c = new Container();
//var_dump($c);
$c->bar = 'Bar';
var_dump($c);die;
$c->foo = function($c){
  return new Foo($c->bar);
};
var_dump($c);

$foo = $c->foo;
var_dump($foo);
$foo->doSomething();//Bim::doSomething|Bar::doSomething|Foo::doSomething|

die;
// ---
$di = new Container();
$di->foo = 'Foo';
/** @var Foo $foo */
$foo = $di->foo;
var_dump($foo);
/*
 * object(Foo)#10 (1) {
  ["_bar":"Foo":private]=>
  object(Bar)#14 (1) {
    ["_bim":"Bar":private]=>
    object(Bim)#16 (0) {
    }
  }
}
 * */
$foo->doSomething();//Bim::doSomething|Bar::doSomething|Foo::doSomething|