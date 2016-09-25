<?php

//********************************************
//*        Explain:用来演示数据库处理程序
//*        FileFormat:UTF-8
//*        Author:Arvin(Yangl2006)
//*        QQ:8769852
//*        By:2008-6-8
//********************************************
include_once 'DataBaseAPI.class.php';

//初始化数据类
$DataBase = DataBaseAPI::Init();

//一条SQL语句
$sql = "select * from user where user_id > ? and user_id < ?";

//将SQL传送到数据类中
$DataBase->setSql($sql);

//为上面的SQL的设置第一个二个条件的值
$DataBase->setValue(array(0,4));

/**
* 返回的数据方式，共有四种形式：
* 0 -- 关联数组形式
* 1  -- 数字索引数组形式
* 2  -- 两者数组形式都有
* 3   -- 按照对象的形式
* (默认:数字索引和数组形式都有)
*/
$DataBase->setDataMode(2);

/**
* 返回的数据类型，共有三种：
* 0 -- 最新插入到数据库的ID
* 1   -- 结果集中的列的数量
* 2  -- 语句执行后影响的行数
* 3  -- 包含了所有行的数组
* 4  -- 结果集中取出一行
* 5  -- 结果集中某一列中的数据 格式:array(5,1) 表示返回第1列的数据
* 6  -- 返回结果集中某一列的结构 格式:array(6,3) 表示返回第3列的结构
* (默认:包含了所有行的数组)
*/
$DataBase->setDataType(3);

/**
* 数据执行的工作类型,共有三种:
* 1:单条预处理执行方式
* 2:多条预处理执行方式
* 3:多条事务处理方式     *
* 默认为:单条预处理执行方式
*/
$DataBase->setWorkType(1);

//执行SQL语句并返回结果
var_dump($DataBase->Perform());
