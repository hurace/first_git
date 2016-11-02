<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-02
 * Time: 18:39
 */
namespace DesignPatterns\Chapter24\Basic;

abstract class Handler{
    protected $successor;

    public function SetSuccessor(Handler $handler){
        $this->successor = $handler;
    }

    public abstract function HandlerRequest($reuest);
}

class ConcreteHandler1 extends Handler{
    public function HandlerRequest($reuest){
        if($reuest > 0 && $reuest < 10){
            echo '处理请求' , $reuest , PHP_EOL;
        }elseif($this->successor != null){
            $this->successor->HandlerRequest($reuest);
        }
    }
}

class ConcreteHandler2 extends Handler{
    public function HandlerRequest($reuest){
        if($reuest > 10 && $reuest < 20){
            echo '处理请求' , $reuest , PHP_EOL;
        }elseif($this->successor != null){
            $this->successor->HandlerRequest($reuest);
        }
    }
}

class ConcreteHandler3 extends Handler{
    public function HandlerRequest($reuest){
        if($reuest > 20 && $reuest < 30){
            echo '处理请求' , $reuest , PHP_EOL;
        }elseif($this->successor != null){
            $this->successor->HandlerRequest($reuest);
        }
    }
}

class Program{
    public static function main(){
        $h1 = new ConcreteHandler1();
        $h2 = new ConcreteHandler2();
        $h3 = new ConcreteHandler3();
        $h1->SetSuccessor($h2);
        $h2->SetSuccessor($h3);

        $request = range(mt_rand(1,10),mt_rand(20,30));

        foreach ($request as $item) {
            $h1->HandlerRequest($item);
        }
    }
}

Program::main();