<?php

//********************************************
//*        Explain:数据库对外接口,所有数据调用与执行统一使用
//* 此类接口,支持常规语句操作(select|update|insert|delete)、
//* 预处理语句以及事务处理语句.
//*        FileFormat:UTF-8
//*        Author:Arvin(Yangl2006)
//*        QQ:8769852
//*        By:2008-6-8
//********************************************
include_once 'PdoConfig.php';

class DataBaseSql
{
    protected $_Sql;
    
    protected $_SqlValue;
    
    protected $_Db;
    
    protected $_DataMode;    
    
    protected $_DataType;
    
    public function __construct()
    {
        $this->_Db = new DataBase;
        
        $this->_Db = $this->_Db->ConnectData();
        
        $this->_DataMode = PDO::FETCH_BOTH;
        
        $this->_DataType = array('fetchAll',0);
    }

    
    //设置SQL语句
    public function setSql($Sql)
    {
        $this->_Sql= $Sql;
    }
    
    //设置SQL的值
    public function setSqlValue($SqlValue)
    {
        $this->_SqlValue = $SqlValue;
    }
    
    protected function CheckSql()
    {
        if(!empty($this->_Sql) && !empty($this->_SqlValue))
        {
            for($i=0;$i_SqlValue);$i++)
            {
                if(count($this->_SqlValue[$i]) !== substr_count($this->_Sql,"?"))
                {                    
                    echo "SQL Error!
";
                    echo "Sql:   ".$this->_Sql."
Value:   ";
                    echo implode(",",$this->_SqlValue[$i]);
                    exit;
                }
            }            
          return true;
        }else{
            return false;
        }
    }
    
    /**
     * 返回的数据方式，共有四种形式：
     * PDO::FETCH_ASSOC -- 关联数组形式
     * PDO::FETCH_NUM   -- 数字索引数组形式
     * PDO::FETCH_BOTH  -- 两者数组形式都有
     * PDO::FETCH_OBJ   -- 按照对象的形式
     * (默认:数字索引和数组形式都有)
     */
    public function setDataMode($num)
    {
        $Parameter[0] = PDO::FETCH_ASSOC;
        $Parameter[1] = PDO::FETCH_NUM;
        $Parameter[2] = PDO::FETCH_BOTH;
        $Parameter[3] = PDO::FETCH_OBJ;
        
        //检测是否属于该方式范围 
        if(array_key_exists($num,$Parameter))
        {
            $this->_DataMode = $Parameter[$num];
        }
    }
    
    /**
     * 返回的数据类型，共有三种：
     * lastInsertId -- 最新插入到数据库的ID
     * columnCount   -- 结果集中的列的数量
     * rowCount  -- 语句执行后影响的行数
     * fetchAll  -- 包含了所有行的数组
     * fetch  -- 结果集中取出一行
     * fetchColumn  -- 结果集中某一列中的数据
     * getColumnMeta  -- 返回结果集中某一列的结构
     * (默认:包含了所有行的数组)
    */
   public function setDataType($DataType)
   {
        $Parameter[0] = 'lastInsertId';
        $Parameter[1] = 'columnCount';
        $Parameter[2] = 'rowCount';
        $Parameter[3] = 'fetchAll';
        $Parameter[4] = 'fetch';
        $Parameter[5] = 'fetchColumn';
        $Parameter[6] = 'getColumnMeta';
        
        if(!is_array($DataType))
        {
            $DataType = array($DataType,0);
        }
        
        if($DataType[0] == 0)
        {
            if(strpos(strtolower($this->_Sql),'insert into') === false)
            {
                  echo "错误: 仅只有 insert into 语句才能获取最新插入到数据库的ID! 请重新设置返回的数据类型" ;
                  exit;
            }
        }
        $this->_DataType = array($Parameter[$DataType[0]],$DataType[1]);
   }
    
}

interface DataManage
{
    //执行SQL语句
    public function PerformSql();
}

final Class DataBaseAPI
{
    private $_Sql;
    
    private $_SqlValue;
    
    /**
     * 返回的数据方式，共有四种形式：
     * 0 -- 关联数组形式
     * 1  -- 数字索引数组形式
     * 2  -- 两者数组形式都有
     * 3   -- 按照对象的形式
     * (默认:数字索引和数组形式都有)
    */
    private $_DataMode = 2;    
    
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
    private $_DataType = 3;  
    
    /**
     * 数据执行的工作类型,共有三种:
     * 1:单条预处理执行方式
     * 2:多条预处理执行方式
     * 3:多条事务处理方式     *
     * 默认为:单条预处理执行方式
     */
    private $_WorkType;
    
    private $_WorkData;
    
    //数据处理对象
    private $_WordObj;
    
    private function __construct()
    {
        //单条预处理执行方式
        $this->_WorkData[0]= 'DataBaseGeneral';
        
        //多条预处理执行方式
        $this->_WorkData[1]= 'DataBasePretreatment';
        
        //多条事务处理方式
        $this->_WorkData[2]= 'DataBaseTransaction';
    }
    
    public function Init()
    {
        return new DataBaseAPI;
    }
    
    //设置工作方式
    public function setWorkType($WorkType)
    {
        if(!array_key_exists($WorkType,$this->_WorkData))
        {
            $WorkType = 0;
        }
        
        $this->_WorkType= $WorkType;        
    }
    
    //设置数据类型
    public function setDataType($DataType)
    {
        $this->_DataType= $DataType;
    }
    
    //设置获取数据方式
    public function setDataMode($DataMode)
    {
        $this->_DataMode = $DataMode;
    }
    
    //设置SQL语句
    public function setSql($Sql)
    {
        $this->_Sql= $Sql;
    }
    
    //设置SQL的值
    public function setValue($SqlValue)
    {
        $this->_SqlValue[]= $SqlValue;
    }
    
    public function Perform()
    {
        
        $this->_WordObj = new $this->_WorkData[$this->_WorkType];            
        
        $this->_WordObj->setSql($this->_Sql);
        
        $this->_WordObj->setSqlValue($this->_SqlValue);        
        
        $this->_WordObj->setDataMode($this->_DataMode);
        
        $this->_WordObj->setDataType($this->_DataType);
        
        return $this->_WordObj->PerformSql();
    }
}
