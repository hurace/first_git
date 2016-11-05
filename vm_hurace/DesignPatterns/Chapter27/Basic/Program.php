<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-05
 * Time: 10:42
 */
namespace DesignPatterns\Chapter27\Basic;

class Context{
    private $_input;

    public function setInput($value){
        $this->_input = $value;
    }

    public function getInput(){
        return $this->_input;
    }

    private $_output;
    public function setOutput($value){
        $this->_output  = $value;
    }

    public function getOutput(){
        return $this->_output;
    }
}

abstract class AbstractExpression{
    public abstract function Interpret(Context $context);
}

class TerminalExpression extends AbstractExpression{
    public function Interpret(Context $context){
        echo '终端解释器' , PHP_EOL;
    }
}

class NonterminalExpression extends AbstractExpression{
    public function Interpret(Context $context){
        echo '非终端解释器' , PHP_EOL;
    }
}

class Program{
    public static function main(){
        $context = new Context();
        $list = array();
        array_push($list, new TerminalExpression());
        array_push($list, new NonterminalExpression());
        array_push($list, new TerminalExpression());
        array_push($list, new TerminalExpression());

        foreach($list as $exp){
            $exp->Interpret($context);
        }
    }
}

Program::main();