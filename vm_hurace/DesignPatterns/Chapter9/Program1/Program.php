<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-18
 * Time: 19:54
 */
namespace DesignPatterns\Chapter9\Program1;

//简历
class Resume{
    private $_name;
    private $_sex;
    private $_age;
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
        echo $this->_name,PHP_EOL,$this->_sex,PHP_EOL,$this->_age;
        echo $this->_timeArea,PHP_EOL,$this->_company;
    }
}

class Program{
    public static function main(){
        $a = new Resume('大鸟');
        $a->SetPersonInfo('男', 29);
        $a->SetWorkExperience('2014-2016', 'XX公司');
        $a->Display();
    }
}

Program::main();