<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2017-03-01
 * Time: 15:59
 */

function mergePass(&$arr, $low, $high, $mid) {
    $i = 0;
    $l = $low;
    $m = $mid + 1;
    $tmp = array();
    while ($l <= $mid && $m <= $high) {
        if ($arr[$l] < $arr[$m]) {
            $tmp[$i] = $arr[$l];
            ++$l;
        } else {
            $tmp[$i] = $arr[$m];
            ++$m;
        }
        ++$i;
    }

    while ($l <= $mid) {
        $tmp[$i] = $arr[$l];
        ++$i;
        ++$l;
    }

    while ($m <= $high) {
        $tmp[$i] = $arr[$m];
        ++$i;
        ++$m;
    }

    for ($i = 0, $l = $low;$l <= $high;++$l) {
        $arr[$l] = $tmp[$i];
        ++$i;
    }

    return;
}

function mergeSort(&$arr, $low, $high) {
    if ($low < $high) {
        $mid = intval(($low + $high) / 2);
        mergeSort($arr, $low, $mid);
        mergeSort($arr, $mid + 1, $high);
        mergePass($arr, $low, $high, $mid);
    }
    return;
}

$arr = array(12, 23, 90, 78, 56, -9, 1, 11);
mergeSort($arr, 0, count($arr) - 1);
var_export($arr);