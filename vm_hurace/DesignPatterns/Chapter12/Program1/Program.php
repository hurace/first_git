<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-21
 * Time: 14:41
 */
namespace DesignPatterns\Chapter12\Program1;

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

class Program{
    public static function main(){
        $gu1 = new Stock1();
        $gu2 = new Stock2();
        $gu3 = new Stock3();
        $nd1 = new NationalDebt1();
        $rt1 = new Realty1();

        $gu1->Buy();
        $gu2->Buy();
        $gu3->Buy();
        $nd1->Buy();
        $rt1->Buy();

        $gu1->Sell();
        $gu2->Sell();
        $gu3->Sell();
        $nd1->Sell();
        $rt1->Sell();
    }
}

Program::main();