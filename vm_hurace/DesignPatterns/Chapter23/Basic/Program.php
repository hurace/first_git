<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-02
 * Time: 14:14
 */
namespace DesignPatterns\Chapter23\Basic;

abstract class Command{
    protected $receiver;
    public function __construct(Receiver $receiver){
        $this->receiver = $receiver;
    }

    public abstract function Execute();
}

class ConcreteCommand extends Command{
    public function __construct(Receiver $receiver){
        parent::__construct($receiver);
    }

    public function Execute(){
        $this->receiver->Action();
    }
}

class Receiver{
    public function Action(){
        echo '执行请求' , PHP_EOL;
    }
}

class Invoker{
    private $_command;

    public function SetCommand(Command $command){
        $this->_command = $command;
    }

    public function ExecuteCommand(){
        $this->_command->Execute();
    }
}

class Program{
    public static function main(){
        $r = new Receiver();
        $c = new ConcreteCommand($r);
        $i = new Invoker();

        $i->SetCommand($c);
        $i->ExecuteCommand();
    }
}

Program::main();