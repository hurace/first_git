<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-28
 * Time: 15:44
 */
namespace DesignPatterns\Chapter16\Program3;

//抽象状态
abstract class State{
    public abstract function WriteProgram(Work $work);
}

//上午工作状态
class ForenoonState extends State{
    public function WriteProgram(Work $work){
        if($work->getHour() < 12){
            echo '当前时间：',$work->getHour(),'点 上午工作，精神百倍',PHP_EOL;
        }else{
            $work->SetState(new NoonState());
            $work->WriteProgram();
        }
    }
}

//中午工作状态
class NoonState extends State{
    public function WriteProgram(Work $work){
        if($work->getHour() < 13){
            echo '当前时间：',$work->getHour(),'点 饿了，午饭；犯困，午休。',PHP_EOL;
        }else{
            $work->SetState(new AfternoonState());
            $work->WriteProgram();
        }
    }
}

//下午工作状态
class AfternoonState extends State{
    public function WriteProgram(Work $work){
        if($work->getHour() < 17){
            echo '当前时间：',$work->getHour(),'点 下午状态还不错，继续努力',PHP_EOL;
        }else{
            $work->SetState(new EveningState());
            $work->WriteProgram();
        }
    }
}

//晚间工作状态
class EveningState extends State{
    public function WriteProgram(Work $work){
        if($work->getFinish()){
            $work->SetState(new ResetState);
            $work->WriteProgram();
        }else{
            if($work->getHour() < 21){
                echo '当前时间：',$work->getHour(),'点 加班哦，疲累之极',PHP_EOL;
            }else{
                $work->SetState(new SleepingState());
                $work->WriteProgram();
            }
        }
    }
}

//睡眠状态
class SleepingState extends State{
    public function WriteProgram(Work $work){
        echo '当前时间：',$work->getHour(),'点 不行了睡着了',PHP_EOL;
    }
}

class Work
{
    private $hour;//钟点
    private $finish;//任务完成
    private $current;

    public function __construct(){
        $this->current = new ForenoonState();
    }

    public function setHour($hour){
        $this->hour = $hour;
    }

    public function getHour(){
        return $this->hour;
    }

    public function setFinish($finish){
        $this->finish = $finish;
    }

    public function getFinish(){
        return $this->finish;
    }

    public function SetState(State $state){
        $this->current = $state;
    }

    public function WriteProgram(){
        $this->current->WriteProgram($this);
    }
}

class Program{
    public static function main(){
        //紧急项目
        $emergencyProjects = new Work();
        $emergencyProjects->setHour(9);
        $emergencyProjects->WriteProgram();
        $emergencyProjects->setHour(10);
        $emergencyProjects->WriteProgram();
        $emergencyProjects->setHour(12);
        $emergencyProjects->WriteProgram();
        $emergencyProjects->setHour(13);
        $emergencyProjects->WriteProgram();
        $emergencyProjects->setHour(14);
        $emergencyProjects->WriteProgram();
        $emergencyProjects->setHour(17);
        $emergencyProjects->WriteProgram();

        $emergencyProjects->setFinish(false);
        $emergencyProjects->setHour(19);
        $emergencyProjects->WriteProgram();
        $emergencyProjects->setHour(22);
        $emergencyProjects->WriteProgram();
    }
}

Program::main();