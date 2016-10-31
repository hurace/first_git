<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-31
 * Time: 16:08
 */
namespace DesignPatterns\Chapter19\Basic;

abstract class Component{
    protected $name;

    public function __construct($name){
        $this->name = $name;
    }

    public abstract function Add(Component $component);
    public abstract function Remove(Component $component);
    public abstract function Display($depth);
}

class Composite extends Component{
    private $_children = array();

    public function __construct($name){
        parent::__construct($name);
    }

    public function Add(Component $component){
        array_push($this->_children, $component);
    }

    public function Remove(Component $component){
        foreach ($this->_children as $key => $child) {
            if($child == $component){
                unset($this->_children[$key]);
            }
        }
        $this->_children = array_values($this->_children);
    }

    public function Display($depth){
        echo str_pad('', $depth, '-'),$this->name,PHP_EOL;
        foreach ($this->_children as $child) {
            $child->Display($depth + 2);
        }
    }
}

class Leaf extends Component{
    public function __construct($name){
        parent::__construct($name);
    }

    public function Add(Component $component){
        echo 'Cannot add to a leaf',PHP_EOL;
    }

    public function Remove(Component $component){
        echo 'Cannot remove from a leaf',PHP_EOL;
    }

    public function Display($depth){
        echo str_pad('', $depth, '-'),$this->name,PHP_EOL;
    }
}

class Program{
    public static function main(){
        $root = new Composite('root');
        $root->Add(new Leaf('Leaf A'));
        $root->Add(new Leaf('Leaf B'));

        $comp = new Composite('Composite X');
        $comp->Add(new Leaf('Leaf XA'));
        $comp->Add(new Leaf('Leaf XB'));

        $root->Add($comp);

        $comp2 = new Composite('Composite XY');
        $comp2->Add(new Leaf('Composite XYA'));
        $comp2->Add(new Leaf('Composite XYB'));

        $comp->Add($comp2);

        $root->Add(new Leaf('Leaf C'));

        $leaf = new Leaf('Leaf D');
        $leaf->Add($leaf);
        $leaf->Remove($leaf);

        $root->Display(1);
    }
}

Program::main();