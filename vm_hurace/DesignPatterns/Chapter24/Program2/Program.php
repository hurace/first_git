<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-11-02
 * Time: 17:44
 */
namespace DesignPatterns\Chapter24\Program2;

//管理者
abstract class Manager{
    protected $name;
    //管理者的上级
    protected $superior;

    public function __construct($name){
        $this->name = $name;
    }

    //设置管理者的上级
    public function SetSuperior(Manager $manager){
        $this->superior = $manager;
    }

    //申请请求
    public abstract function RequestApplications(Request $request);
}

//经理
class CommonManager extends Manager{
    public function __construct($name){
        parent::__construct($name);
    }

    public function RequestApplications(Request $request){
        if($request->getType() == '请假' && $request->getNumber() <= 2){
            echo $this->name , ':' , $request->getContent() , '数量' , $request->getNumber() , '被批准' , PHP_EOL;
        }else{
            if($this->superior != null){
                $this->superior->RequestApplications($request);
            }
        }
    }
}

//总监
class Majordomo extends Manager{
    public function __construct($name){
        parent::__construct($name);
    }

    public function RequestApplications(Request $request){
        if($request->getType() == '请假' && $request->getNumber() <= 5){
            echo $this->name , ':' , $request->getContent() , '数量' , $request->getNumber() , '被批准' , PHP_EOL;
        }else{
            if($this->superior != null){
                $this->superior->RequestApplications($request);
            }
        }
    }
}

//总经理
class GeneralManager extends Manager{
    public function __construct($name){
        parent::__construct($name);
    }

    public function RequestApplications(Request $request){
        if($request->getType() == '请假'){
            echo $this->name , ':' , $request->getContent() , '数量' , $request->getNumber() , '被批准' , PHP_EOL;
        }elseif($request->getType() == '加薪' && $request->getNumber() <= 500){
            echo $this->name , ':' , $request->getContent() , '数量' , $request->getNumber() , '被批准' , PHP_EOL;
        }elseif($request->getType() == '加薪' && $request->getNumber() > 500){
            echo $this->name , ':' , $request->getContent() , '数量' , $request->getNumber() , '再说吧' , PHP_EOL;
        }
    }
}

//申请
class Request{
    //申请类别
    private $_requestType;
    public function setType($type){
        $this->_requestType = $type;
    }

    public function getType(){
        return $this->_requestType;
    }

    //申请内容
    private $_requestContent;
    public function setContent($content){
        $this->_requestContent = $content;
    }

    public function getContent(){
        return $this->_requestContent;
    }

    //数量
    private $_number;
    public function setNumber($num){
        $this->_number = $num;
    }

    public function getNumber(){
        return $this->_number;
    }
}

class Program{
    public static function main(){
        $jinli = new CommonManager('金利');
        $zongjian = new Majordomo('宗剑');
        $zhonjinli = new GeneralManager('钟锦鲤');
        $jinli->SetSuperior($zongjian);
        $zongjian->SetSuperior($zhonjinli);

        $request = new Request();
        $request->setType('请假');
        $request->setContent('小菜请假');
        $request->setNumber(1);
        $jinli->RequestApplications($request);

        $request2 = new Request();
        $request2->setType('请假');
        $request2->setContent('小菜请假');
        $request2->setNumber(4);
        $jinli->RequestApplications($request2);

        $request3 = new Request();
        $request3->setType('加薪');
        $request3->setContent('小菜请求加薪');
        $request3->setNumber(500);
        $jinli->RequestApplications($request3);

        $request4 = new Request();
        $request4->setType('加薪');
        $request4->setContent('小菜请求加薪');
        $request4->setNumber(1000);
        $jinli->RequestApplications($request4);
    }
}

Program::main();