<?php
function downfile($fileurl)
{
 ob_start(); 
 $filename=$fileurl;
 $date=date("Y-m-d");
 header( "Content-type:  application/octet-stream "); 
 header( "Accept-Ranges:  bytes "); 
 header( "Content-Disposition:  attachment;  filename= {$date}.csv"); 
 $size=readfile($filename); 
 header( "Accept-Length: " .$size);
}
$url="http://www.jstore.cn/2016/2016-09-22.csv";
//downfile($url);


function getFile($url,$save_dir='',$filename='',$type=0){
  if(trim($url)==''){
   return false;
  }
  if(trim($save_dir)==''){
   $save_dir='./';
  }
  if(0!==strrpos($save_dir,'/')){
   $save_dir.='/';
  }
  //创建保存目录
  if(!file_exists($save_dir)&&!mkdir($save_dir,0777,true)){
   return false;
  }
 //获取远程文件所采用的方法
 if($type){
  $ch=curl_init();
  $timeout=5;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
  $content=curl_exec($ch);
  curl_close($ch);
 }else{
  ob_start();
  readfile($url);
  $content=ob_get_contents();
  ob_end_clean();
}
 $size=strlen($content);
 //文件大小
 $fp2=@fopen($save_dir.$filename,'a');
 fwrite($fp2,$content);
 fclose($fp2);
 unset($content,$url);
 return array('file_name'=>$filename,'save_path'=>$save_dir.$filename);
}
$filename = '2016-09-22.csv';
$save_dir = './';
$res = getFile($url,$save_dir,$filename,1);//调用
var_export($res);
