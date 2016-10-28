<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-28
 * Time: 15:15
 */
namespace DesignPatterns\Chapter16\Program2;

class Work{
    private $hour;//钟点
    private $finish;//任务完成

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

    public function WriteProgram(){
        if ($this->hour < 12) {
            echo '当前时间：',$this->hour,'点 上午工作，精神百倍',PHP_EOL;
        } else if ($this->hour < 13) {
            echo '当前时间：',$this->hour,'点 饿了，午饭；犯困，午休。',PHP_EOL;
        } else if ($this->hour < 17) {
            echo '当前时间：',$this->hour,'点 下午状态还不错，继续努力',PHP_EOL;
        } else {
            if ($this->finish) {
                echo '当前时间：',$this->hour,'点 下班回家了',PHP_EOL;
            } else {
                if ($this->hour < 21) {
                    echo '当前时间：',$this->hour,'点 加班哦，疲累之极',PHP_EOL;
                } else {
                    echo '当前时间：',$this->hour,'点 不行了，睡着了。',PHP_EOL;
                }
            }
        }
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