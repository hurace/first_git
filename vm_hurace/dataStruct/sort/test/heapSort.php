<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2017-01-03
 * Time: 16:59
 */

function heapify(&$arr, $i, $size)
{
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;
    $largest = $i;

    if($left < $size) {
        if ($arr[$largest] < $arr[$left]) {
            $largest = $left;
        }
    }

    if($right < $size){
        if($arr[$largest] < $arr[$right]){
            $largest = $right;
        }
    }

    if($largest != $i){
        $tmp = $arr[$i];
        $arr[$i] = $arr[$largest];
        $arr[$largest] = $tmp;

        heapify($arr, $largest, $size);
    }

    return;
}

function heap_max(&$arr, $size)
{
    for($i = $size-1;$i >= 0;--$i){
        heapify($arr,$i, $size);
    }
    return;
}

function heap_sort(&$arr, $size)
{
    for($i = $size-1;$i >= 0;--$i){
        heap_max($arr, $i+1);

        $tmp = $arr[$i];
        $arr[$i] = $arr[0];
        $arr[0] = $tmp;
    }
    return;
}

$arr = array(12, 90, 23, -9, 34, 11, 88, 2, 9);
//heap_max($arr, count($arr));
heap_sort($arr, count($arr));
foreach($arr as $val)
    echo $val,',';
echo PHP_EOL;