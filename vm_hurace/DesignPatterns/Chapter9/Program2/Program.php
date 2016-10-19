<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/19
 * Time: 22:03
 */
namespace DesignPatterns\Chapter9\Program2;

//简历
class Resume{
    private $_name;
    private $_age;
    private $_sex;
    private $_timeArea;
    private $_company;

    public function __construct($name){
        $this->_name = $name;
    }

    //设置个人信息
    public function SetPersonInfo($sex, $age){
        $this->_sex = $sex;
        $this->_age = $age;
    }

    //设置工作经历
    public function SetWorkExperience($timeArea, $company){
        $this->_timeArea = $timeArea;
        $this->_company = $company;
    }

    //显示
    public function Display(){
        echo $this->_name,' ',$this->_sex,' ',$this->_age,PHP_EOL;
        echo $this->_timeArea,' ',$this->_company,PHP_EOL;
    }
}

class Program{
    public static function main(){
        $a = new Resume('大鸟');
        $a->SetPersonInfo('男', 29);
        $a->SetWorkExperience('2014-2016', 'XX公司');

        $b = clone $a;
        $b->SetWorkExperience('2012-2016','XX公司');

        $c = clone $a;
        $c->SetPersonInfo('女', 26);

        $a->Display();
        $b->Display();
        $c->Display();
    }
}

Program::main();