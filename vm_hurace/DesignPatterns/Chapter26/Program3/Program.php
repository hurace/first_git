<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-03
 * Time: 17:57
 */
namespace DesignPatterns\Chapter26\Program3;

//用户
use DesignPatterns\Chapter23\Program3\Waiter;

class User{
    private $_name;
    public function __construct($name){
        $this->_name = $name;
    }

    public function getName(){
        return $this->_name;
    }
}

//网站工厂
class WebSiteFactory{
    private $_fiyweights = array();

    //获得网站分类
    public function GetWebSiteCategory($key){
        if(!array_key_exists($key, $this->_fiyweights)){
            $this->_fiyweights[$key] = new ConcreteWebSite($key);
        }
        return $this->_fiyweights[$key];
    }

    //获得网站分类总数
    public function GetWebSiteCount(){
        return count($this->_fiyweights);
    }
}

//网站
abstract class WebSite{
    public abstract function myUse(User $user);
}

//具体的网站
class ConcreteWebSite extends WebSite{
    private $_name;
    public function __construct($name){
        $this->_name = $name;
    }

    public function myUse(User $user){
        echo '网站分类：' , $this->_name , '用户：' , $user->getName() , PHP_EOL;
    }
}

class Program{
    public static function main(){
        $f = new WebSiteFactory();

        $fx = $f->GetWebSiteCategory('产品展示');
        $fx->myUse(new User('小菜'));

        $fx = $f->GetWebSiteCategory('产品展示');
        $fx->myUse(new User('大鸟'));

        $fx = $f->GetWebSiteCategory('产品展示');
        $fx->myUse(new User('娇娇'));

        $fx = $f->GetWebSiteCategory('博客');
        $fx->myUse(new User('老顽童'));

        $fx = $f->GetWebSiteCategory('博客');
        $fx->myUse(new User('桃谷六仙'));

        $fx = $f->GetWebSiteCategory('博客');
        $fx->myUse(new User('南海鳄神'));
    }
}

Program::main();