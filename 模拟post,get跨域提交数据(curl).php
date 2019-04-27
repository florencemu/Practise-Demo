 <?php  
    function curl_post($url, $post) {  
        $options = array(  
            CURLOPT_RETURNTRANSFER => true,  
            CURLOPT_HEADER         => false,  
            CURLOPT_POST           => true,  
            CURLOPT_POSTFIELDS     => $post,  
        );  
      
        $ch = curl_init($url); /*初始化*/ 
        curl_setopt_array($ch, $options);  /*为cURL传输会话批量设置选项*/
        $result = curl_exec($ch);  /*执行一个cURL会话*/
        curl_close($ch);  /*结束*/
        return $result;  
    }  
      
    $data = curl_post("http://www.a.com/post/post.php", array('name'=>'caiknife', 'email'=>'caiknife@gmail.com'));  
      
    var_dump($data);  

