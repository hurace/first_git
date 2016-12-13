<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-12-13
 * Time: 18:30
 */

function selectSort(&$arr, $length)
{
    for($i = 0;$i < $length;++$i){
        $min = $arr[$i];
        $t = $i;
        for($j = $i+1;$j < $length;++$j){
            if($min > $arr[$j]){
                $min = $arr[$j];
                $t = $j;
            }
        }
        $arr[$t] = $arr[$i];
        $arr[$i] = $min;
    }
    return;
}

$arr = array(12, 23, -9, 56, 7, 0, 35);
$arr = array(12, 23, 45, -9, 89, 76, 5);
selectSort($arr, count($arr));
foreach ($arr as $item) {
    echo $item,',';
}
echo PHP_EOL;