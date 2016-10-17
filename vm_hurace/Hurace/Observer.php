<?php
/**
 * 观察者模式
 */

class Paper{/* 主题    */
	private $_observers = array();

	//注册观察者	
	public function register($sub){
		$this->_observers[] = $sub;
	}

	public function trigger(){//外部统一访问
		if(!empty($this->_observers)){
			foreach($this->_observers as $observer){
				$observer->update();
			}
		}
	}
}

/**
 * 观察者要实现的接口
 */
interface Observerable{
	public function update();
}

class Subscriber implements Observerable{
	public function update(){
		echo 'CallBack...',PHP_EOL;
	}
}

#$paper = new Paper();
#$paper->register(new Subscriber());
#$paper->trigger();



#----------------------华丽的分割线---------------------------------------------------------------------------------------------------------------------

/*
问题：
假如一个小贩， 他把产品的价格提升了， 不同的消费者会对此产生不同的反应。一般的编程模式无非是获取提升的价格，然后获取所有的消费者，再循环每个消费者， 不同的消费者根据价格涨幅做出决定，如果消费者的类型有限，因而进行的判断也不多，这种无可厚非，但如果有更多的类型的消费者加入进来， 那这个代码就变得臃肿且难以维护， 因为要不停的往里面加入判断代码，这个时候其实就适用观察者模式了

思路：
　　观察者模式分为两个角色，　观察者(observer)和被观察者(observables), 先在被观察者注册一系列的被观察者， 在被观察者发生变化的时候，通知观察者，进而观察者自动进行更新，这种一对多的关系就像你是一个小贩(被观察者)，卖东西，有很多人(观察者)在买你的东西，假如你要升价， 这个时候所有的消费者(观察者)可以决定继续买，还是不买，还是其他动作，作为小贩(被观察者)的你只需要把价格增加，继而通知一下，而不用去管其他人(观察者)的动作。

*/

 //先定义一个被观察者的接口，这个接口要实现注册观察者，删除观察者和通知的功能。
 interface Observables
 {
    public function attach(observer $ob);
    public function detach(observer $ob);
    public function notify();
 }

 class Saler implements Observables
 {
    protected $obs = array();       //把观察者保存在这里
    protected $range = 0;

    public function attach(Observer $ob)
    {
        $this->obs[] = $ob;
    }

    public function detach(Observer $ob)
    {
        foreach($this->obs as $o)
        {
            if($o != $ob)
                $this->obs[] = $o;
        }
    }

    public function notify()
    {
        foreach($this->obs as $o)
        {
            $o->doActor($this);
        }
    }

    public function increPrice($range)
    {
        $this->range = $range;
    }

    public function getAddRange()
    {
        return $this->range;
    }
 }


 //定义一个观察者的接口，这个接口要有一个在被通知的时候都要实现的方法
 interface Observer
 {
    public function doActor(Observables $obv);
 }

//为了容易阅读，我在这里增加了一层，定义了一个买家， 之后会有Poor和Rich两种不同的类型继承这个类，用以表示不同类型的买家 
 abstract class Buyer implements Observer
 {
 }

 class PoorBuyer extends Buyer
 {
     //PoorBurer的做法
    public function doActor(observables $obv)
    {
        if($obv->getAddRange() > 10)
            echo  '不买了...',PHP_EOL;
        else
            echo '还行，买一点吧...',PHP_EOL;
    }
 }

class RichBuyer extends Buyer
{
    //RichBuyer的做法
    public function doActor(observables $obv)
    {
        echo '你再涨我也不怕，咱不差钱...',PHP_EOL;
    }
}


$saler = new Saler();  //小贩(被观察者)
$saler->attach(new PoorBuyer()); //注册一个低收入的消费者(观察者)
$saler->attach(new RichBuyer()); //注册一个高收入的消费者(观察者)
$saler->notify(); //通知

$saler->increPrice(12);  //涨价
$saler->notify();  //通知

