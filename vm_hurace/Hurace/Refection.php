<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-24
 * Time: 10:48
 */
namespace Hurace;

class Person{
    public function getName(){
        echo '我是...',PHP_EOL;
    }
}

$class = new \ReflectionClass( __NAMESPACE__ . '\\' . 'Person');
$instance = $class->newInstance();
//echo __NAMESPACE__,PHP_EOL;
$instance->getName();