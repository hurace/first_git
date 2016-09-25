<?php

//********************************************
//*        Explain:事务处理类,只有数据库支持事务才能使用否则将
//* 有严重错误提示
//*        FileFormat:UTF-8
//*        Author:Arvin(Yangl2006)
//*        QQ:8769852
//*        By:2008-6-8
//********************************************

class DataBaseTransaction extends DataBaseSql implements DataManage
{
    private $_Sth;
    
    private $_getData;
    
    //执行SQL语句
    public function PerformSql()
    {
         if(parent::CheckSql())
         {
           try{
                 //事务开始
                $this->_Db->beginTransaction();
                
               //绑定SQL
                $this->_Sth = $this->_Db->prepare($this->_Sql);
                
               /*
                * 循环将参数绑到上面的SQL语句中并执行,将返回的结果进行保存
                */
                foreach ($this->_SqlValue as $key=>$value)
                {
                    for($i=0;$i                     {
                        $a[$i] = $value[$i];
                        if($key == 0)
                        {
                            $this->_Sth->bindParam($i+1,$a[$i]);
                        }
                    }                
                    $this->_Sth->execute();
                
                                @$this->_Sth->setFetchMode($this->_DataMode);
                
                                if($this->_DataType[0] == 'lastInsertId')
                                {
                                   $data = $this->_Db->{$this->_DataType[0]}($this->_DataType[1]);
                                }else{
                                   $data = $this->_Sth->{$this->_DataType[0]}($this->_DataType[1]);
                                }
                                
                                /*
                                 * 如果返回的结果是非数组的形式即使用数组保存
                                 * 如果返回的结果是数组将所有的数组结果进行合并
                                 */
                                if(is_array($data))
                                {
                        $this->_getData = array_merge($this->_getData,$data);
                                }else{
                                    $this->_getData[] = $data;
                                }
                }
                
              //事务处理完毕
              $this->_Db->commit();
              
           }catch (Exception $e) {
               
                   //事务强行终止
                  $this->_Db->rollBack();
                  echo "Failed: " . $e->getMessage();
            }
         }
         return $this->_getData;
    }
    
}
