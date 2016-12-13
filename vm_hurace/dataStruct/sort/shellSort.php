<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-12-13
 * Time: 15:14
 */

function shellSort(&$arr, $length)
{
    $group = intval($length / 2);
    while($group >=1 ){
        echo $group,'--',PHP_EOL;
        for($i = $group;$i < $length; ++$i){
            for($j = $i-$group;$j >= 0;$j = $j-$group){
                if($arr[$j] > $arr[$j+$group]){
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j+$group];
                    $arr[$j+$group] = $tmp;
                }
            }
        }
        $group = intval($group / 2);
    }
    return;
}

$arr = array(12, 43, 67, 89, 1, -9, 34);

shellSort($arr, count($arr));

foreach($arr as $val)
    echo $val,',';
echo PHP_EOL;