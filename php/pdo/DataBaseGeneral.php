<?php

//********************************************
//*        Explain:最基础的数据处理,但不包括预处理和事务处理
//*        FileFormat:UTF-8
//*        Author:Arvin(Yangl2006)
//*        QQ:8769852
//*        By:2008-6-8
//********************************************
class DataBaseGeneral extends DataBaseSql implements DataManage
{
    private $_Sth;
    
    private $_getData;
    
    //执行SQL语句
    public function PerformSql()
    {
         if(parent::CheckSql())
         {
           try{
               //绑定SQL
                $this->_Sth = $this->_Db->prepare($this->_Sql);
                
               /*
                * 循环将参数绑到上面的SQL语句中并执行,将返回的结果进行保存
                */
                for($i=0;$i_SqlValue[0]);$i++)
                {
                    $this->_Sth->bindParam($i+1,$this->_SqlValue[0][$i]);
                }
                
                $this->_Sth->execute();
                
                            @$this->_Sth->setFetchMode($this->_DataMode);
           
                                
                            if($this->_DataType[0] == 'lastInsertId')
                            {
                               $this->_getData = $this->_Db->{$this->_DataType[0]}($this->_DataType[1]);
                            }else{
                               $this->_getData = $this->_Sth->{$this->_DataType[0]}($this->_DataType[1]);
                            }
                            
           }catch (Exception $e) {
                  echo "Failed: " . $e->getMessage();
            }
         }
         return $this->_getData;
    }
    
}
