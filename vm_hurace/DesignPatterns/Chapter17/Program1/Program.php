<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-29
 * Time: 10:33
 */
namespace DesignPatterns\Chapter17\Program1;

//篮球运动员
abstract class Player{
    protected $_name;

    public function __construct($name){
        $this->_name = $name;
    }

    public abstract function Attack();
    public abstract function Defense();
}

//前锋
class Forwards extends Player{
    public function __construct($name){
        parent::__construct($name);
    }

    public function Attack(){
        echo '前锋',$this->_name,'进攻',PHP_EOL;
    }

    public function Defense(){
        echo '前锋',$this->_name,'防守',PHP_EOL;
    }
}

//中锋
class Center extends Player{
    public function __construct($name){
        parent::__construct($name);
    }

    public function Attack(){
        echo '中锋',$this->_name,'进攻',PHP_EOL;
    }

    public function Defense(){
        echo '中锋',$this->_name,'防守',PHP_EOL;
    }
}

//后卫
class Guards extends Player{
    public function __construct($name){
        parent::__construct($name);
    }

    public function Attack(){
        echo '后卫',$this->_name,'进攻',PHP_EOL;
    }

    public function Defense(){
        echo '后卫',$this->_name,'防守',PHP_EOL;
    }
}

//外籍中锋
class ForeignCenter{
    private $_name;

    public function setName($name){
        $this->_name = $name;
    }

    public function getName(){
        return $this->_name;
    }

    public function jingong(){
        echo '外籍中锋',$this->_name,'进攻',PHP_EOL;
    }

    public function fangshou(){
        echo '外籍中锋',$this->_name,'防守',PHP_EOL;
    }
}

//翻译者
class Translator extends Player{
    private $_wjzf;

    public function __construct($name){
        $this->_wjzf = new ForeignCenter();
        $this->_wjzf->setName($name);
        parent::__construct($name);
    }

    public function Attack(){
        $this->_wjzf->jingong();
    }

    public function Defense(){
        $this->_wjzf->fangshou();
    }
}

class Program{
    public static function main(){
        $b = new Forwards('巴蒂尔');
        $b->Attack();

        $m = new Guards('麦克格雷迪');
        $m->Attack();

        $ym = new Translator('姚明');
        $ym->Attack();
        $ym->Defense();
    }
}

Program::main();