 <?php
    $link=mysql_connect("localhost","root",null);
    mysql_select_db("bbs",$link);
    mysql_query("set names utf8");
    $id=$_GET['id'];
    $memcache = new memcache;
    $memcache->connect('127.0.0.1', 11211) or die ("连接失败");
//$memcache->flush();  清除缓存
    if($info=$memcache->get($id))
   {  
     echo $info;
     exit;
   }
   else
  {
     $result=mysql_query("select * from user where id=$id");
     if($result)
     {
         $arr=mysql_fetch_array($result);
         echo "need mysql query";
         $memcache->add($id,$arr['id'],MEMCACHE_COMPRESSED,60*60*24);
      }
  }
