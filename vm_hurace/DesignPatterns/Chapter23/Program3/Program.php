<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-02
 * Time: 11:01
 */
namespace DesignPatterns\Chapter23\Program3;

//服务员
class Waiter{
    private $_orders = array();

    //设置订单
    public function SetOrder(Command $command){
        if($command == ''){
            echo '服务员：鸡翅没有了，请点别的烧烤。' , PHP_EOL;
        }else{
            array_push($this->_orders, $command);
            echo '增加订单：' , $command , '时间：' , date('Y-m-d H:i:s') , PHP_EOL;
        }
    }

    //取消订单
    public function CancelOrder(Command $command){
        array_pop($this->_orders);
        echo '取消订单：' , $command , '时间：' , date('Y-m-d H:i:s') , PHP_EOL;
    }

    //通知全部执行
    public function Notify(){
        foreach ($this->_orders as $order) {
            $order->ExcuteCommand();
        }
    }
}

//抽象命令
abstract class Command{
    protected $receiver;

    public function __construct(Barbecuer $barbecuer){
        $this->receiver = $barbecuer;
    }

    //执行命令
    public abstract function ExcuteCommand();

    public function __toString(){
        return '---';
    }
}

//烤羊肉串命令
class BakeMuttonCommand extends Command{
    public function __construct(Barbecuer $barbecuer){
        parent::__construct($barbecuer);
    }

    public function ExcuteCommand(){
        $this->receiver->BakeMutton();
    }
}

//烤鸡翅命令
class BakeChickenWingCommand extends Command{
    public function __construct(Barbecuer $barbecuer){
        parent::__construct($barbecuer);
    }

    public function ExcuteCommand(){
        $this->receiver->BakeChickenWing();
    }
}

//烤肉串者
class Barbecuer{
    public function BakeMutton(){
        echo '烤羊肉串!' , PHP_EOL;
    }

    public function BakeChickenWing(){
        echo '烤鸡翅!' , PHP_EOL;
    }
}

class Program{
    public static function main(){
        //开店前的准备
        $boy = new Barbecuer();
        $bakeMuttonCommand1 = new BakeMuttonCommand($boy);
        $bakeMuttonCommand2 = new BakeMuttonCommand($boy);
        $bakeChickenWingCommand1 = new BakeChickenWingCommand($boy);

        $girl = new Waiter();
        //开门营业 顾客点菜
        $girl->SetOrder($bakeMuttonCommand1);
        $girl->SetOrder($bakeMuttonCommand2);
        $girl->SetOrder($bakeChickenWingCommand1);

        //点菜完闭，通知厨房
        $girl->Notify();
    }
}

Program::main();