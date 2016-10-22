<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-22
 * Time: 15:24
 */
namespace DesignPatterns\Chapter15\Program1;

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

class SqlServerUser{
    public function Inser(User $user){
        echo '在Sqlserver中给User表增加一条记录',PHP_EOL;
    }

    public function GetUser($id){
        echo '在Sqlserver中根据ID得到User表一条记录',PHP_EOL;
        return null;
    }
}

class Program{
    public static function main(){
        $user = new User();
        $su = new SqlServerUser();

        $su->Inser($user);
        $su->GetUser(1);
    }
}

Program::main();