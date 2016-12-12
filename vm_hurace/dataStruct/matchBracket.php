<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-12-09
 * Time: 17:14
 */

$str = '{{()}}}}';
$track = array();
$i = 0;
$tmp = '0';
$flag = 0;
while($i < strlen($str)){
    echo $str[$i];
    switch($str[$i]){
        case '{':
            array_push($track, $str[$i]);
            break;
        case '[':
            array_push($track, $str[$i]);
            break;
        case '(':
            array_push($track, $str[$i]);
            break;
        case ')':
            $tmp = array_pop($track);
            if('(' != $tmp){
                $flag = 1;
            }
            break;
        case ']':
            $tmp = array_pop($track);
            if('[' != $tmp){
                $flag = 1;
            }
            break;
        case '}':
            $tmp = array_pop($track);
            if('{' != $tmp){
                $flag = 1;
            }
            break;
        default:
            break;
    }
    ++$i;
}
echo PHP_EOL;

if(!$flag && !count($track)){
    echo '匹配', PHP_EOL;
}else{
    echo '不匹配', PHP_EOL;
}