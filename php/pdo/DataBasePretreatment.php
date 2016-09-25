<?php

//********************************************
//*        Explain:预处理接口,用户传入一条SQL语句后可传入多个
//* 相同类型的条件,进行多个处理,如同时插入几条记录
//*        FileFormat:UTF-8
//*        Author:Arvin(Yangl2006)
//*        QQ:8769852
//*        By:2008-6-8
//********************************************
class DataBasePretreatment extends DataBaseSql implements DataManage
{
    private $_Sth;
    
    private $_getData = array();
    
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
           }catch (Exception $e) {
                  echo "Failed: " . $e->getMessage();
            }
         }
         return $this->_getData;
    }
    
}
