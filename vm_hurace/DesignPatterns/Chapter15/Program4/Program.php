<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-22
 * Time: 17:33
 */
namespace DesignPatterns\Chapter15\Program4;

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

class Department{
    private $_id;
    public $ID;
    private $_deptName;

    public function __set($name, $value){
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }
}

interface IUser{
    public function Insert();
    public function GetUser($id);
}

class SqlServerUser implements IUser{
    public function Insert(){
        echo '在Sqlserver中给User表增加一条记录',PHP_EOL;
    }

    public function GetUser($id){
        echo '在Sqlserver中根据ID得到User表一条记录',PHP_EOL;
        return null;
    }
}

class AccessUser implements IUser{
    public function Insert(){
        echo '在Access中给User表增加一条记录',PHP_EOL;
    }

    public function GetUser($id){
        echo '在Access中根据ID得到User表一条记录',PHP_EOL;
        return null;
    }
}

interface IDepartment{
    public function Insert(Department $department);
    public function GetDepartment($id);
}

class SqlServerDepartment implements IDepartment{
    public function Insert(Department $department){
        echo '在Sqlserver中给Department表增加一条记录',PHP_EOL;
    }

    public function GetDepartment($id){
        echo '在Sqlserver中根据ID得到Department表一条记录',PHP_EOL;
        return null;
    }
}

class AccessDepartment implements IDepartment{
    public function Insert(Department $department){
        echo '在Access中给Department表增加一条记录',PHP_EOL;
    }

    public function GetDepartment($id){
        echo '在Access中根据ID得到Department表一条记录',PHP_EOL;
        return null;
    }
}

class DataAccess{
    private static $_db = 'SqlServer';

    public static function CreatUser(){
        $result = null;
        switch(self::$_db){
            case 'SqlServer':
                $result = new SqlServerUser();
                break;
            case 'Access':
                $result = new AccessUser();
                break;
        }
        return $result;
    }

    public static function CreateDepartment(){
        $result = null;
        switch(self::$_db){
            case 'SqlServer':
                $result = new SqlServerDepartment();
                break;
            case 'Access':
                $result = new AccessDepartment();
        }
        return $result;
    }
}

class Program{
    public static function main(){
        $user = new User();
        $dept = new Department();

        $iu = DataAccess::CreatUser();

        $iu->Insert();
        $iu->GetUser(1);

        $id = DataAccess::CreateDepartment();

        $id->Insert();
        $id->GetDepartment(1);
    }
}

Program::main();