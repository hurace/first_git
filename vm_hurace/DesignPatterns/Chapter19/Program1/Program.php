<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-31
 * Time: 15:22
 */
namespace DesignPatterns\Chapter19\Program1;

abstract class Company{
    protected $name;

    public function __construct($name){
        $this->name = $name;
    }

    public abstract function Add(Company $company);//增加
    public abstract function Remove(Company $company);//移除
    public abstract function Display($depth);//显示
    public abstract function LineOfDuty();//履行职责
}

class ConcreteCompany extends Company{
    private $_childred = array();

    public function __construct($name){
        parent::__construct($name);
    }

    public function Add(Company $company){
        $this->_childred[] = $company;
    }

    public function Remove(Company $company){
        foreach ($this->_childred as $key => $item) {
            if($item == $company){
                unset($this->_childred[$key]);
            }
        }
        $this->_childred = array_values($this->_childred);
    }

    public function Display($depth){
        echo str_pad('', $depth, '-'),$this->name,PHP_EOL;
        foreach ($this->_childred as $key => $item) {
            $item->Display($depth + 2);
        }
    }

    //履行职责
    public function LineOfDuty(){
        foreach($this->_childred as $key => $child){
            $child->LineOfDuty();
        }
    }
}

//人力资源部
class HRDepartment extends Company{
    public function __construct($name){
        parent::__construct($name);
    }

    public function Add(Company $company){

    }

    public function Remove(Company $company){

    }

    public function Display($depth){
        echo str_pad('', $depth, '-') , $this->name , PHP_EOL;
    }

    public function LineOfDuty(){
        echo '员工招聘培训管理' , $this->name , PHP_EOL;
    }
}

//财务部
class FinanceDepartment extends Company{
    public function __construct($name){
        parent::__construct($name);
    }

    public function Add(Company $company){

    }

    public function Remove(Company $company){

    }

    public function Display($depth){
        echo str_pad('', $depth, '-') , $this->name , PHP_EOL;
    }

    public function LineOfDuty(){
        echo '公司财务收支管理' , $this->name , PHP_EOL;
    }
}

class Program{
    public static function main(){
        $root = new ConcreteCompany('北京总公司');
        $root->Add(new HRDepartment('总公司人力资源部'));
        $root->Add(new FinanceDepartment('总公司财务部'));

        $comp = new ConcreteCompany('上海华东分公司');
        $comp->Add(new HRDepartment('华东分公司人力资源部'));
        $comp->Add(new FinanceDepartment('华东分公司财务部'));

        $root->Add($comp);

        $comp1 = new ConcreteCompany('南京办事处');
        $comp1->Add(new HRDepartment('南京办事处人力资源部'));
        $comp1->Add(new FinanceDepartment('南京办事处财务部'));

        $comp->Add($comp1);

        $comp2 = new ConcreteCompany('杭州办事处');
        $comp2->Add(new HRDepartment('杭州办事处人力资源部'));
        $comp2->Add(new FinanceDepartment('杭州办事处财务部'));

        $comp1->Add($comp2);

        echo '结构图' , PHP_EOL;

        $root->Display(1);

        echo '职责' , PHP_EOL;

        $root->LineOfDuty();
    }
}

Program::main();