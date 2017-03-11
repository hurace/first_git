<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2017-03-11
 * Time: 15:47
 */

function findPos(&$arr, $L, $R) {
    $base = $arr[$L];
    $bL = $L;
    while ($L != $R) {
        while ($L < $R) {
            if ($arr[$R] < $base)
                break;
            --$R;
        }

        while ($L < $R) {
            if ($arr[$L] > $base)
                break;
            ++$L;
        }

        if ($L < $R) {
            $tmp = $arr[$R];
            $arr[$R] = $arr[$L];
            $arr[$L] = $tmp;
        }
    }
    $arr[$bL] = $arr[$L];
    $arr[$L] = $base;
    return $L;
}

function quickSort(&$arr, $L, $R) {
    if ($L < $R) {
        $pos = findPos($arr, $L, $R);
        quickSort($arr, $L, $pos);
        quickSort($arr, $pos+1, $R);
    }
    return;
}

$arr = array(23, 12, -23, 67, 90, 34, 3, 76, 89);
quickSort($arr, 0, 8);
foreach($arr as $val)
    echo $val,'  ';