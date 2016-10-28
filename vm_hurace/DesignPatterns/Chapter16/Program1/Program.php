<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-28
 * Time: 15:02
 */
namespace DesignPatterns\Chapter16\Program1;

function WriteProgram($Hour, $WorkFinished=true){
    if ($Hour < 12) {
        echo '当前时间：',$Hour,'点 上午工作，精神百倍',PHP_EOL;
    } else if ($Hour < 13) {
        echo '当前时间：',$Hour,'点 饿了，午饭；犯困，午休。',PHP_EOL;
    } else if ($Hour < 17) {
        echo '当前时间：',$Hour,'点 下午状态还不错，继续努力',PHP_EOL;
    } else {
        if ($WorkFinished) {
            echo '当前时间：',$Hour,'点 下班回家了',PHP_EOL;
        } else {
            if ($Hour < 21) {
                echo '当前时间：',$Hour,'点 加班哦，疲累之极',PHP_EOL;
            } else {
                echo '当前时间：',$Hour,'点 不行了，睡着了。',PHP_EOL;
            }
        }
    }
}

function main(){
    $Hour = 9;
    WriteProgram($Hour);
    $Hour = 10;
    WriteProgram($Hour);
    $Hour = 12;
    WriteProgram($Hour);
    $Hour = 13;
    WriteProgram($Hour);
    $Hour = 14;
    WriteProgram($Hour);
    $Hour = 17;

    $WorkFinished = true;
    //WorkFinished = false;

    WriteProgram($Hour,$WorkFinished);
    $Hour = 19;
    WriteProgram($Hour);
    $Hour = 22;
    WriteProgram($Hour);
}

main();
