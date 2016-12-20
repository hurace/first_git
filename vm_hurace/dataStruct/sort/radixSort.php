<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-12-17
 * Time: 15:46
 */

function radixSort(&$arr, $size)
{
    $base = 10;
    //找出最大数
    $max = $arr[0];
    for($i = 1;$i < $size;++$i){
        if($arr[$i] > $max){
            $max = $arr[$i];
        }
    }

    $exp = 1;//位数
    $tmp = array();
    while(intval($max / $exp) > 0){

        //重置基数桶
        $bucket = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0,);

        //统计每个基数上有多少个数据
        for($i = 0;$i < $size;++$i){
            $bucket[($arr[$i] / $exp) % $base]++;
        }
        var_export($bucket);

        //求出基数桶的边界索引,bucket[i]值为第i个桶的右边界索引+1
        for($i = 1;$i < $base;++$i){
            $bucket[$i] += $bucket[$i-1];
        }
        var_export($bucket);

        //这里要从右向左扫描，保证排序稳定性
        for($i = $size - 1;$i >= 0;--$i){
            $tmp[--$bucket[($arr[$i] / $exp) % $base]] = $arr[$i];
        }
        var_export($tmp);

        for($i = 0;$i < $size;++$i){
            $arr[$i] = $tmp[$i];
        }

        $exp *= $base;
    }

    return;
}

$arr = array(12, 3, 90, 88, 55, 33, 1, 89, 90);
radixSort($arr, count($arr));
foreach($arr as $val)
    echo $val,',';
echo PHP_EOL;