<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-12-15
 * Time: 12:23
 */

/**
 * ①分解：将当前区间一分为二，即求分裂点：mid = (low+high)/2;
 * ②求解：递归地对两个子区间R[low..mid]和R[mid+1..high]进行归并排序；
 * ③组合：将已排序的两个子区间R[low..mid]和R[mid+1..high]归并为一个有序的区间R[low..high]。
 */

/**
 * 合并两个有序序列
 */
function mergePass(&$arr, $low, $high, $mid)
{
    $i = 0;
    $l = $low;
    $m = $mid + 1;
    $tmp = array();
    while($l <= $mid && $m <= $high){
        if($arr[$l] > $arr[$m]){
            $tmp[$i] = $arr[$m];
            ++$m;
        } else {
            $tmp[$i] = $arr[$l];
            ++$l;
        }
        ++$i;
    }

    while($l <= $mid){
        $tmp[$i] = $arr[$l];
        ++$i;
        ++$l;
    }

    while($m <= $high){
        $tmp[$i] = $arr[$m];
        ++$i;
        ++$m;
    }

    for($k = 0,$l = $low;$l <= $high;++$k,++$l){
        $arr[$l] = $tmp[$k];
    }

    return;
}

/**
 * 归并排序
 */
function mergeSort(&$arr, $low, $high)
{
    if($low < $high){
        $mid = intval(($high + $low) / 2);
        mergeSort($arr, $low, $mid);
        mergeSort($arr, $mid+1, $high);
        mergePass($arr, $low, $high, $mid);
    }
    return;
}

$arr = array(12, 23, 90, 78, 56, -9, 1, 11);
mergeSort($arr, 0, count($arr)-1);
//mergePass($arr, 0, count($arr)-1, 4);
foreach($arr as $val)
    echo $val,',';
echo PHP_EOL;