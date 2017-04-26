<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2017-04-18
 * Time: 15:11
 */

/**
一群猴子排成一圈，按1，2，...，n依次编号。然后从第1只开始数，数到第m只,把它踢出圈，从它后面再开始数，再数到第m只，在把它踢出去...，如此不停的进行下去，直到最后只剩下一只猴子为止，那只猴子就叫做大王。要求编程模拟此过程，输入m、n, 输出最后那个大王的编号。
 */

function king($m, $n)
{
    $arr = array();
    for ($i = 1;$i <= $n;++$i) {
        $arr[$i] = $i;
    }
    var_export($arr);
    $k = 1;
    while (count($arr) > 1) {
        if (($k % $m) == 0) {//遍历数组，判断当前猴子是否为出局序号，如果是则出局，否则放到数组最后
            unset($arr[$k]);
        } else {
            $arr[] = $arr[$k];//本轮非出局猴子放数组尾部
            unset($arr[$k]);
        }
        ++$k;
    }

    return $arr;
}

//$king = king(4, 5);
//var_export($king);


function writeData($path, $mode, $data, $max_retreies = 10) {
    $handle = fopen($path, $mode);
    $retreies = 0;
    do {
        if( $retreies > 0) {
            usleep(100);
        }
        ++$retreies;
    } while (!flock($handle, LOCK_EX) && $retreies <= $max_retreies);
    if( $retreies == $max_retreies) {
        return false;
    }
    fwrite($handle, $data);
    flock($handle, LOCK_UN);
    fclose($handle);
    return true;
}

class RedisPool
{
    private static $connections = array(); //定义一个对象池
    private static $servers = array(); //定义redis配置文件
    public static function addServer($conf) //定义添加redis配置方法
    {
        foreach ($conf as $alias => $data){
            self::$servers[$alias]=$data;
        }
    }

    public static function getRedis($alias,$select = 0)//两个参数要连接的服务器KEY,要选择的库
    {
        if(!array_key_exists($alias,self::$connections)){  //判断连接池中是否存在
            $redis = new Redis();
            $redis->connect(self::$servers[$alias][0],self::$servers[$alias][1]);
            self::$connections[$alias]=$redis;
            if(isset(self::$servers[$alias][2]) && self::$servers[$alias][2]!=""){
                self::$connections[$alias]->auth(self::$servers[$alias][2]);
            }
        }
        self::$connections[$alias]->select($select);
        return self::$connections[$alias];
    }
}

class Monkey
{
    public $no;
    public $next = null;
    public function __construct($no)
    {
        $this->no = $no;
    }
}

$first = null;

function addMonkey(&$first, $n)
{
    $cur = $first;
    for ($i = 0;$i < $n;++$i) {
        $monkey = new Monkey($i+1);

        if (0 == $i) {
            $first = $monkey;
            $first->next = $monkey;
            $cur = $first;
        } else {
            $cur->next = $monkey;
            $monkey->next = $first;
            $cur = $cur->next;
        }
    }
}

function showMonkey($first)
{
    $cur = $first;
    while ($cur->next != $first) {
        echo $cur->no,PHP_EOL;
        $cur = $cur->next;
    }
    echo $cur->no,PHP_EOL;
}

function countMonkey($first, $m, $k)
{
    $tail = $first;
    while ($tail->next != $first) {
        $tail = $tail->next;
    }


    for ($i = 0; $i < $k-1;++$i) {
        $tail->next = $first;
        $first = $first->next;
    }

    while ($tail != $first) {

        for ($i = 1;$i < $m;++$i) {
            $tail = $tail->next;
            $first = $first->next;
        }
        echo '出圈的人的编号是', $first->no, PHP_EOL;
        $first = $first->next;
        $tail->next = $first;

    }
    echo '最后留在圈圈的人的编号是', $tail->no, PHP_EOL;
}

$first = null;
$n = 4;
addMonkey($first, $n);
showMonkey($first);

$m = 4;
$k = 1;
countMonkey($first, $m, $k);