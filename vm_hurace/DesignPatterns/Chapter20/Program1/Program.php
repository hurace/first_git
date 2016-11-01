<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-01
 * Time: 10:15
 */
namespace DesignPatterns\Chapter20\Program1;

abstract class Aggregate{
    public abstract function CreateIterator();
}

class ConcreteAggregate extends Aggregate{
    private $_items = array();

    public function CreateIterator(){
        return new ConcreteIterator($this);
    }

    public function Count(){
        return count($this->_items);
    }

    public function setItems($index, $value){
        $this->_items[$index] = $value;
    }

    public function getItems($index){
        return $this->_items[$index];
    }
}

abstract class Iterator{
    public abstract function First();
    public abstract function Next();
    public abstract function IsDone();
    public abstract function CurrentItem();
}

class ConcreteIterator extends Iterator{
    private $_aggregate;
    private $_current = 0;

    public function __construct(ConcreteAggregate $aggregate){
        $this->_aggregate = $aggregate;
    }

    public function First(){
        return $this->_aggregate->getItems(0);
    }

    public function Next(){
        $ret = null;
        $this->_current++;
        if($this->_current < $this->_aggregate->Count()){
            $ret = $this->_aggregate->getItems($this->_current);
        }
        return $ret;
    }

    public function CurrentItem(){
        return $this->_aggregate->getItems($this->_current);
    }

    public function IsDone(){
        return $this->_current >= $this->_aggregate->Count() ? true : false;
    }

}

class ConcreteIteratorDesc extends Iterator{
    private $_aggregate;
    private $_current = 0;

    public function __construct(ConcreteAggregate $aggregate){
        $this->_aggregate = $aggregate;
        $this->_current = $this->_aggregate->Count() - 1;
    }

    public function First(){
        return $this->_aggregate->getItems($this->_aggregate->Count() - 1);
    }

    public function Next(){
        $ret = null;
        $this->_current--;
        if($this->_current >= 0){
            $ret = $this->_aggregate->getItems($this->_current);
        }

        return $ret;
    }

    public function CurrentItem(){
        return $this->_aggregate->getItems($this->_current);
    }

    public function IsDone(){
        return $this->_current < 0 ? true : false;
    }
}

class Program{
    public static function main(){
        $a = new ConcreteAggregate();

        $a->setItems(0, '大鸟');
        $a->setItems(1, '小菜');
        $a->setItems(2, '行李');
        $a->setItems(3, '老外');
        $a->setItems(4, '公交内部员工');
        $a->setItems(5, '小偷');

        $i = new ConcreteIterator($a);
        $item = $i->First();
        while(!$i->IsDone()){
            echo $i->CurrentItem() , ':请买车票' , PHP_EOL;
            $i->Next();
        }
    }
}

Program::main();