<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-21
 * Time: 14:52
 */
namespace DesignPatterns\Chapter12\Program2;

//股票1
class Stock1{
    //卖股票
    public function Sell(){
        echo ' 股票1卖出',PHP_EOL;
    }

    //买股票
    public function Buy(){
        echo ' 股票1买入',PHP_EOL;
    }
}

//股票2
class Stock2
{
    //卖股票
    public function Sell(){
        echo ' 股票2卖出',PHP_EOL;
    }

    //买股票
    public function Buy(){
        echo ' 股票2买入',PHP_EOL;
    }
}

//股票3
class Stock3{
    //卖股票
    public function Sell(){
        echo ' 股票3卖出',PHP_EOL;
    }

    //买股票
    public function Buy(){
        echo ' 股票3买入',PHP_EOL;
    }
}

//国债1
class NationalDebt1
{
    //卖国债
    public function Sell(){
        echo ' 国债1卖出',PHP_EOL;
    }

    //买国债
    public function Buy(){
        echo ' 国债1买入',PHP_EOL;
    }
}

//房地产1
class Realty1
{
    //卖房地产
    public function Sell(){
        echo ' 房产1卖出',PHP_EOL;
    }

    //买房地产
    public function Buy(){
        echo ' 房产1买入',PHP_EOL;
    }
}

class Fund{
    protected $gu1;
    protected $gu2;
    protected $gu3;
    protected $nd1;
    protected $rt1;

    public function __construct(){
        $this->gu1 = new Stock1();
        $this->gu2 = new Stock2();
        $this->gu3 = new Stock3();
        $this->nd1 = new NationalDebt1();
        $this->rt1 = new Realty1();
    }

    public function BuyFund(){
        $this->gu1->Buy();
        $this->gu2->Buy();
        $this->gu3->Buy();
        $this->nd1->Buy();
        $this->rt1->Buy();
    }

    public function ShellFund(){
        $this->gu1->Sell();
        $this->gu2->Sell();
        $this->gu3->Sell();
        $this->nd1->Sell();
        $this->rt1->Sell();
    }
}

class Program{
    public static function main(){
        $jijin = new Fund();
        $jijin->BuyFund();
        $jijin->ShellFund();
    }
}

Program::main();