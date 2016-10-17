<?php

#	echo phpinfo();
#	echo 'Hello,World!';
#	echo "\n";

#function __autoload($class){
#	echo '__autoload class:',$class,"\n";
#	require $class . '.php';
#}
#new Demo();

/*
function __autoload($class_name){
	echo '__autoload class_name:',$class_name,"\n";
}

function classLoader($class_name){
	echo 'SPL classLoader class_name:',$class_name,"\n";
}

spl_autoload_register('classLoader');

new Test();
*/

/*
class ClassLoader
{
	public static function loader($class_name){
		$class_file = strtolower($class_name) . '.php';
		if(file_exists($class_file)){
			require_once($class_file);
		}
	}
}

spl_autoload_register('ClassLoader::loader');

$test = new Test();
*/

/*
set_include_path( get_include_path() . PATH_SEPARATOR . '/root/php');
#echo constant('PATH_SEPARATOR'),"\n";
echo get_include_path();
echo "\n";
*/


/*
//栈 先进后出
$stack = new SplStack();
$stack->push('1');
$stack->push('2');
$stack->push('3');

echo $stack->pop(),"\n";
echo $stack->pop(),"\n";
echo $stack->pop(),"\n";
*/

/*
//队列 先进先出
$queue = new SplQueue();
$queue->enqueue('1');
$queue->enqueue('2');
$queue->enqueue('3');

echo $queue->dequeue(),"\n";
echo $queue->dequeue(),"\n";
echo $queue->dequeue(),"\n";
*/

/*
//最小堆
$heap = new SplMinHeap();
$heap->insert('8');
$heap->insert('5');
$heap->insert('2');

echo $heap->extract(),PHP_EOL;
echo $heap->extract(),PHP_EOL;
echo $heap->extract(),PHP_EOL;
*/


