<?php

//********************************************
//*        Explain:数据库连接，根据配置文件中的参数进行数据库
//* 连接，连接失败即返回错误代码（代码的具体内容可以
//* 在配置文件中定制），连接成功将返回一个数据库连接对象
//*        FileFormat:UTF-8
//*        Author:Arvin(Yangl2006)
//*        QQ:8769852
//*        By:2008-6-7
//********************************************

Class DataBase extends PdoConfig
{
    //配置文件
    private $_PdoConfig;
    
    //数据库连接参数
    private $_Connect;
    
    //其他配置参数
    private $_OtherConnect;
    
    //数据库连接
    private static $_DbManager;
    
    //允许将更新后的PdoConfig传进来
    public function __construct($Obj = false)
    {
        if(is_object($Obj))
        {
            $this->_PdoConfig = $Obj;
        }else{
            $this->_PdoConfig = parent::Init();
        }
        
        $this->_Connect = $this->_PdoConfig->ConnectConfig();
        
        $this->_OtherConnect = $this->_PdoConfig->ParameterConfig();
    }
        
    public function ConnectData()
    {
                if(self::$_DbManager === null)//当连接不存在时才进行连接否则使用原来的连接
                {
                        try {
                                                            
                                self::$_DbManager = new PDO(
                                "mysql:host=".$this->_Connect['Db_Host'].";dbname=".$this->_Connect['Db_DataName'].";port=".$this->_Connect['Db_Port']."",
                                $this->_Connect['Db_User'],$this->_Connect['Db_PassWord'],$this->setLongMode($this->_OtherConnect['LongMode']));
                        }
                        catch( PDOException $e )//出错提示
                        {
                            exit( $e->__toString());
                        }
                        self::$_DbManager->exec('set names \'utf8\'');//默认编码
                        
                        //设置字段显示方式
                        $this->setFieldMode($this->_OtherConnect['FieldMode']);
                        
                        //设置错误显示方式
                        $this->setErrorShowMode($this->_OtherConnect['ErrorShowMode']);
                        
                        //设置空格转换方式
                        $this->setNullMode($this->_OtherConnect['NullMode']);
                        
                        //设置自动提交方式
                        $this->setAutoMode($this->_OtherConnect['AutoMode']);                
            }
            return self::$_DbManager;
    }
           
    /**
     * 字段名强制转换成大写或小写
     * PDO::CASE_LOWER: 强制列名是小写
     * PDO::CASE_NATURAL: 列名按照原始的方式
     * PDO::CASE_UPPER: 强制列名为大写
     * (默认:列名按照原始的方式)
     */
    protected function setFieldMode($num)
    {
        $Parameter[0] = PDO::CASE_LOWER;
        $Parameter[1] = PDO::CASE_NATURAL;
        $Parameter[2] = PDO::CASE_UPPER;
        
        self::$_DbManager->setAttribute(PDO::ATTR_CASE,$Parameter[$num]);
    }
       
    /**
     * 错误提示方式
     * PDO::ERRMODE_SILENT: 不显示错误信息，只显示错误码
     * PDO::ERRMODE_WARNING: 显示警告错误
     * PDO::ERRMODE_EXCEPTION: 抛出异常
     * (默认:抛出异常)
     */
    protected function setErrorShowMode($num)
    {
        $Parameter[0] = PDO::ERRMODE_SILENT;
        $Parameter[1] = PDO::ERRMODE_WARNING;
        $Parameter[2] = PDO::ERRMODE_EXCEPTION;
        
        self::$_DbManager->setAttribute(PDO::ATTR_ERRMODE,$Parameter[$num]);
    }
    
        /**
     * 指定数据库返回的NULL值在php中对应的数值
     * PDO::NULL_NATURAL: 不变
     * PDO::NULL_EMPTY_STRING: 空字符转换成 NULL.
     * PDO::NULL_TO_STRING: NULL 转换成空字符
     * (默认:不变)
     */
    protected function setNullMode($num)
    {
        $Parameter[0] = PDO::NULL_NATURAL;
        $Parameter[1] = PDO::NULL_EMPTY_STRING;
        $Parameter[2] = PDO::NULL_TO_STRING;
        
        self::$_DbManager->setAttribute(PDO::ATTR_ORACLE_NULLS,$Parameter[$num]);
    }

    
        /**
     * 是否开启持久连接
     * (默认:开启)
     */
    protected function setLongMode($num)
    {
        $Parameter[0] = array(PDO::ATTR_PERSISTENT => TRUE);
        $Parameter[1] = array(PDO::ATTR_PERSISTENT => FALSE);
        return $Parameter[$num];
    }
    
    /**
     * 是否开启自动提交功能
     * (默认:开启)
     */
    protected  function setAutoMode($num)
    {
         $Parameter[0] = true; 
         $Parameter[1] = false; 
         
         self::$_DbManager->setAttribute(PDO::ATTR_AUTOCOMMIT,$Parameter[$num]);
    }
}
