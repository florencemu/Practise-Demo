 <?php
 
 
    //接受id
    $id=@$_GET['id'];
 
        //看看如何使用html静态页面
        //思路，看看html页面是否有，如果有，直接访问，没有就创建
        //构建一个文件名.
        $html_filename="news_id".$id.".html";
 
        echo file_get_contents($html_filename);
        //filemtime()=>获取文件的最后修改时间
        //filemtime($html_filename)+30>time() 表示静态文件，
//      if(file_exists($html_filename)&& filemtime($html_filename)+30>time()){
//         
//          //直接访问html页面(把html页面的内容 echo 浏览器)
//          echo file_get_contents($html_filename);
//          exit;
//      }
//
//      $conn=mysql_connect("localhost","root","root");
//     
//      if(!$conn){
//          die("连接失败");
//      }
//
//      mysql_select_db("spdb1",$conn);
//
//     
//      $sql="select * from news where id=$id";
//      $res=mysql_query($sql);
//      //开启ob缓存
//      ob_start();
//      if($row=mysql_fetch_assoc($res)){
//
//          header("content-type:text/html;charset=utf-8");
//          echo "<table  border='1px' bordercolor='green' cellspacing='0' width=400px height=200px>";
//          echo "<tr><td>新闻详细内容</td></tr>";
//          echo "<tr><td>{$row['title']}</td></tr>";
//          echo "<tr><td>{$row['content']}</td></tr>";
//          echo "</table>";
//      }else{
//          echo "没有结果";
//      }
//
//      $html_content=ob_get_contents();
//      $my_hader="<head><meta http-equiv='content-type' content='text/html;charset=utf-8'/></head>";
//      //把ob->$html_filename (必要时，需要考虑路径)
//      file_put_contents($html_filename,$my_hader.$html_content);
//
//      mysql_free_result($res);
//      mysql_close($conn);
 
 
?> 
