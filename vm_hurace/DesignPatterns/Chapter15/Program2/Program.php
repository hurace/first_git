<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-22
 * Time: 15:31
 */

namespace DesignPatterns\Chapter15\Program2;

class User{
    private $_id;
    public $ID;
    private $_name;

    public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }
}

interface IUser{
    public function Inser();
    public function GetUser($id);
}

class SqlServerUser implements IUser{
    public function Inser(){
        echo '在Sqlserver中给User表增加一条记录',PHP_EOL;
    }

    public function GetUser($id){
        echo '在Sqlserver中根据ID得到User表一条记录',PHP_EOL;
        return null;
    }
}

class AccessUser implements IUser{
    public function Inser(){
        echo '在Access中给User表增加一条记录',PHP_EOL;
    }

    public function GetUser($id){
        echo '在Access中根据ID得到User表一条记录',PHP_EOL;
        return null;
    }
}

interface IFactory{
    public function CreateUser();
}

class SqlServerFactory implements IFactory{
    public function CreateUser(){
        return new SqlServerUser();
    }
}

class AccessFactory implements IFactory{
    public function CreateUser(){
        return new AccessUser();
    }
}

class Program{
    public static function main(){
        $user = new User();
        $factory = new AccessFactory();

        $iu = $factory->CreateUser();

        $iu->Inser();
        $iu->GetUser(1);
    }
}

Program::main();