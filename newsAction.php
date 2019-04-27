/*
真静态化

（1）创建模板文件template.html 
（2）通过模板文件,创建静态页面的 php文件 xx.php
（3）用户访问生成的静态页面 xx.html 





*/ 


<?php
 
 
    header("content-type:text/html;charset=utf-8");
 
 
    function replace($row,$title,$content){
            //含义是 用 $title的内容替换 $row中的 %title%
            $row=str_replace("%title%",$title,$row);
            $row=str_replace("%content%",$content,$row);
            return $row;
 
    }
 
 
    //处理添加、修改、删除请求
    //1.接收一下oper
    $oper=$_REQUEST['oper'];
 
     
    if($oper=="add"){
         
 
            //接收title,content
            $title=$_POST['title'];
            $content=$_POST['content'];
 
            //1.把数据放入到mysql, 同时创建一个html
 
            //添加到数据库 SqlHelper.class.php
 
            $conn=mysql_connect("localhost","root","root");
         
            if(!$conn){
                die("连接失败");
            }
 
            //构建html_filename
            //$file=
 
            mysql_select_db("spdb1",$conn);
 
            $sql="insert into  news (title,content) values('$title','$content')";
 
            if(mysql_query($sql,$conn)){
                 
                //获取刚刚插入数据的id号
                $id=mysql_insert_id();
                $html_filename="news_id".$id.".html";
                //echo "文件名=".$html_filename;
 
                //创建html文件
                $fp_tmp=fopen("template.tpl","r");
                $fp_html_file=fopen($html_filename,"w");
                //思路->tmp->html 逐行读取template.tpl文件，然后逐行替换
                   
                while(!feof($fp_tmp)){
                     
                        //读取一行.
                        $row=fgets($fp_tmp);
                        //替换(小函数)
                        $new_row=replace($row,$title,$content);
 
                        //把替换后的一行写入到html文件
                        fwrite($fp_html_file,$new_row);
                }
 
                //关闭文件流
                fclose($fp_tmp);
                fclose($fp_html_file);
 
                echo "添加到数据库并成功创建html文件<a href='news_list.php'>返回列表</a>";
 
            }
 
             
            mysql_close($conn);
 
    }
 
 
?> 
