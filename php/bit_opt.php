<?php

$x = 2;
$y = 5;
//echo $x = $x ^ $y,"\n";//1
//echo $y = $y ^ $x,"\n";//2
//echo $x = $x ^ $y,"\n";//3

echo $x >> 1,"\n";//1 右移 每一次移动都表示“除以 2”
echo $x << $y,"\n";//16 左移 每一次移动都表示“乘以 2”
echo $y >> 1,"\n";