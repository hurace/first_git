<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-12-08
 * Time: 18:37
 */

/**
 * 1．先从数列中取出一个数作为基准数。
 * 2．分区过程，将比这个数大的数全放到它的右边，小于或等于它的数全放到它的左边。
 * 3．再对左右区间重复第二步，直到各区间只有一个数。
 * */

function findPos(&$arr, $L, $R){
    $base = $arr[$L];//以数组第一个元素为基准数
    $bL = $L;//基准数的位置
    while($L != $R){
        //顺序很重要，要先从右边开始找

        while($L < $R){//右边向左查找比基准数小的值，找到立即停下来
            if($arr[$R] < $base)
                break;
            --$R;
        }

        while($L < $R){//左边向右查抄比基准数大的值，找到立即停下来
            if($arr[$L] > $base)
                break;
            ++$L;
        }

        if($L < $R){//交换左右两边找到的值
            $tmp = $arr[$L];
            $arr[$L] = $arr[$R];
            $arr[$R] = $tmp;
        }
    }
    //把基准数交换到查找停止的位置，这样，$L左边的值都小于等于基准数，右边的值都大于基准数
    $arr[$bL] = $arr[$L];
    $arr[$L] = $base;
    return $L;
}

function quickSort(&$arr, $L, $R){
    if($L < $R){
        $pos = findPos($arr, $L, $R);
        quickSort($arr, $L, $pos-1);
        quickSort($arr, $pos+1, $R);
    }
    return;
}

$arr = array(23, 12, -23, 67, 90, 34, 3, 76, 89);
quickSort($arr, 0, 8);
foreach($arr as $val)
    echo $val,'  ';

