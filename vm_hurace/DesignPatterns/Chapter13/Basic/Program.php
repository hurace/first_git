<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-21
 * Time: 18:51
 */
namespace DesignPatterns\Chapter13\Basic;

class Director{
    public function Construct(Builder $builder){
        $builder->BuildPartA();
        $builder->BuildPartB();
    }
}

abstract class Builder{
    public abstract function BuildPartA();
    public abstract function BuildPartB();
    public abstract function GetResult();
}

class ConcreteBuilder1 extends Builder{
    private $_product;
    public function __construct(){
        $this->_product = new Product();
    }

    public function BuildPartA(){
        $this->_product->Add('部件A');
    }

    public function BuildPartB(){
        $this->_product->Add('部件B');
    }

    public function GetResult(){
        return $this->_product;
    }
}

class ConcreteBuilder2 extends Builder{
    private $_product;
    public function __construct(){
        $this->_product = new Product();
    }

    public function BuildPartA(){
        $this->_product->Add('部件X');
    }

    public function BuildPartB(){
        $this->_product->Add('部件Y');
    }

    public function GetResult(){
        return $this->_product;
    }
}

class Product{
    protected $parts = array();
    public function Add($str){
        array_push($this->parts,$str);
    }

    public function Show(){
        echo '产品 创建 ----',PHP_EOL;
        foreach ($this->parts as $part) {
            echo $part,PHP_EOL;
        }
    }
}

class Program{
    public static function main(){
        $director = new Director();
        $b1 = new ConcreteBuilder1();
        $b2 = new ConcreteBuilder2();

        $director->Construct($b1);
        $p1 = $b1->GetResult();
        $p1->Show();

        $director->Construct($b2);
        $p2 = $b2->GetResult();
        $p2->Show();
    }
}

Program::main();