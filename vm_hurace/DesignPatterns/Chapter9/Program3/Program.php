<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/19
 * Time: 22:42
 */
namespace DesignPatterns\Chapter9\Program3;

//简历
class Resume{
    private $_name;
    private $_sex;
    private $_age;
    private $_work;

    public function __construct($name){
        $this->_name = $name;
        $this->_work = new WorkExperience();
    }

    //设置个人信息
    public function SetPersonInfo($sex, $age){
        $this->_sex = $sex;
        $this->_age = $age;
    }

    //设置工作经历
    public function SetWorkExperience($workDate, $company){
        $this->_work->_workDate = $workDate;
        $this->_work->_company = $company;
    }

    //显示
    public function Display(){
        echo $this->_name,' ',$this->_sex,' ',$this->_age,PHP_EOL;
        echo '工作经历：',$this->_work->_workDate,' ',$this->_work->_company,PHP_EOL;
    }
}

//工作经历
class WorkExperience{
    private $_workDate;
    private $_company;

    public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }
}

class Program{
    public static function main(){
        $a = new Resume('大鸟');
        $a->SetPersonInfo('男', 29);
        $a->SetWorkExperience('2014-2016', 'XX公司');

        $b = clone $a;
        $b->SetWorkExperience('2012-2014', 'YY公司');

        $c = clone $a;
        $c->SetPersonInfo('女', 26);
        $c->SetWorkExperience('2010-2013', 'ZZ公司');

        $a->Display();
        $b->Display();
        $c->Display();
    }
}

Program::main();
