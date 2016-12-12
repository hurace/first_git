<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-12-10
 * Time: 16:44
 */

function insertSort(&$arr)
{
    for($i = 1;$i<count($arr);++$i){
        if($arr[$i] < $arr[$i-1]){
            $tmp = $arr[$i];
            for($j=$i-1;$j>=0&&$arr[$j]>$tmp;--$j){
                $arr[$j+1] = $arr[$j];
            }
            $arr[$j+1] = $tmp;
        }
    }
}

$arr = array(21, 25, 49, 25, 16, 8);
insertSort($arr);
foreach ($arr as $item) {
    echo $item,',';
}
echo PHP_EOL;