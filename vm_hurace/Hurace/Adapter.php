<?php

//适配目标，规定的接口将被适配对象实现

interface IDatabases{
	public function connect($host,$user,$password,$dbtabase);
	public function query($sql);
}

//适配器
class Mysql implements IDatabases{
	protected $connect;

	public function connect($host,$user,$password,$database){
		$connect = mysql_connect($host,$user,$password);
		mysql_select_db($database,$connect);
		$this->connect = $connect;
		//...
	}
	
	public function query($sql){
		//...
	}
}

//适配器
class Pdo implements IDatabases{
	protected $conn;
	
	public function connect($host,$user,$password,$database){
		$this->conn = new PDO("mysql:host=$host;dbname=$database",$user,$password);
		//...
	}

	public function query($sql){
		//...
	}
}

//客户端使用

$client = new Pdo();
$client->query($sql);
