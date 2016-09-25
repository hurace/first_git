<?php

//********************************************
//*        Explain:主要对数据库连接和数据执行以及获取的结果格式
//* 进行设置
//*        FileFormat:UTF-8
//*        Author:Arvin(Yangl2006)
//*        QQ:8769852
//*        By:2008-6-7
//********************************************

header("Content-type:text/html; charset=utf-8");
ini_set("upload_max_filesize", "32M");
ini_set("memory_limit", "128M");
ini_set("post_max_size", "64M");
ini_set("max_execution_time", "0");
ini_set('date.timezone','Asia/Shanghai');
class PdoConfig
{
    //保存自己本身
    protected static $_Config = false;
    
    //数据其他参数配置
    protected $_DataConfig;
    
    //默认连接参数
    private $_DefaultConnect;
    
    public function __construct()
    {
        //数据库主机地址
        $this->_DefaultConnect['Db_Host'] = "localhost";
        
        //用户名称
        $this->_DefaultConnect['Db_User'] = "root";
        
        //用户对应的密码
        $this->_DefaultConnect['Db_PassWord'] = "123456";
        
        //数据库名称
        $this->_DefaultConnect['Db_DataName'] = "News";
        
        //数据库端口
        $this->_DefaultConnect['Db_Port'] = 3306;
    }
    
    //初始化
    public static function Init()
    {
        if(!self::$_Config)
        {
            self::$_Config = new PdoConfig;
        }
        
        //单一模式
        return self::$_Config;
    }
    
    /**
     * 设置连接配置,如果需要修改此默认设置
     * 只需要传一相同格式的数组进来即可
     * @param Array $Parameter
     * @return $this->_DefaultConnect
     */
    public function ConnectConfig($Parameter = false)
    {
        if(
        !empty($Parameter['Db_Host']) &&
        !empty($Parameter['Db_User']) &&
        !empty($Parameter['Db_PassWord']) &&
        !empty($Parameter['Db_DataName']) &&
        !empty($Parameter['Db_Port'])
        )
        {
            $this->_DefaultConnect = $Parameter;
        }
        
        //返回参数
        return $this->_DefaultConnect;
    }
    
    //设置数据库配置的默认参数
    public function ParameterConfig()
    {
        /**
         * 返回的数据方式，共有四种形式：
         * 0 -- 关联数组形式
         * 1 -- 数字索引数组形式
         * 2 -- 两者数组形式都有
         * 3 -- 按照对象的形式
         * (默认:2)
         */        
        $this->_DataConfig['DataMode'] = 2;
        
        /**
         * 字段名强制转换成大写或小写
         * 0: 强制列名是小写
         * 1: 列名按照原始的方式
         * 2: 强制列名为大写
         * (默认:1)
         */
         $this->_DataConfig['FieldMode'] = 1;
         
         /**
         * 错误提示方式
         * 0: 不显示错误信息，只显示错误码
         * 1: 显示警告错误
         * 2: 抛出异常
         * (默认:2)
         */         
         $this->_DataConfig['ErrorShowMode'] = 2;
         
         /**
         * 指定数据库返回的NULL值在php中对应的数值
         * 0: 不变
         * 1: 空字符转换成 NULL.
         * 2: NULL 转换成空字符
         * (默认:0)
         */         
         $this->_DataConfig['NullMode'] = 0;
         
         /**
          * 是否开启持久连接
         * 0: 关闭
         * 1: 开启.
          * (默认:0)
          */
         $this->_DataConfig['LongMode'] = 1;
         
         /**
          * 是否开启自动提交功能
         * 0: 关闭
         * 1: 开启.
          * (默认:1)
          */
         $this->_DataConfig['AutoMode'] = 1;
         
         //返回参数
         return $this->_DataConfig;
    }
}

/*
* __autoload 函数，它会在试图使用尚未被定义的类
* 时自动调用。通过调用此函数，脚本引擎在 PHP 出错
* 失败前有了最后一个机会加载所需的类
*/
function __autoload($class_name)
{
    if(file_exists($class_name.".conn.php"))
    {
        $file = $class_name.".conn.php";
    }
    
    if(file_exists($class_name.".php"))
    {
        $file = $class_name.".php";
    }
    
    if(file_exists($class_name.".class.php"))
    {
        $file = $class_name.".class.php";
    }
    
    if(!empty($file))
    {
        include_once "$file";
    }
}
