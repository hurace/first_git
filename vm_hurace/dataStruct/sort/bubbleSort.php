<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-12-13
 * Time: 15:40
 */

function bubbleSort(&$arr, $length)
{
    for($i = 0;$i < $length;++$i){
        for($j = $i; $j < $length;++$j){
            if($arr[$i] > $arr[$j]){
                $tmp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
    return;
}

$arr = array(12, 45, 90, 23, -9, 5, 90, 22);
bubbleSort($arr, count($arr));
foreach ($arr as $item) {
    echo $item,',';
}
echo PHP_EOL;