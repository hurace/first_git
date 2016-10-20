<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-20
 * Time: 15:52
 */
namespace DesignPatterns\Chapter9\Program4;

interface ICloneable{
    public function IClone();
}

//简历
class Resume implements ICloneable{
    private $_name;
    private $_sex;
    private $_age;
    private $_work;

    public function __construct($name){
        $this->_name = $name;
        $this->_work = new WorkExperience();
    }

    private function Resume(WorkExperience $work){
        $this->_work = $work->IClone();
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

    public function IClone(){
        $obj = new Resume($this->_work);

        $obj->_name = $this->_name;
        $obj->_sex = $this->_sex;
        $obj->_age = $this->_age;

        return $obj;
    }
}

//工作经历
class WorkExperience implements ICloneable{
    private $_workDate;
    private $_company;

    public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }

    public function IClone(){
        return clone $this;
    }
}

class Program{
    public static function main(){
        $a = new Resume('大鸟');
        $a->SetPersonInfo('男', 29);
        $a->SetWorkExperience('2014-2016', 'XX公司');

        $b = $a->IClone();
        $b->SetWorkExperience('2012-2014', 'YY公司');

        $c = $a->IClone();
        $c->SetPersonInfo('女', 26);
        $c->SetWorkExperience('2010-2013', 'ZZ公司');

        $a->Display();
        $b->Display();
        $c->Display();
    }
}

Program::main();