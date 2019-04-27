<?php  
    function file_get_contents_post($url, $post) {  
        $options = array(  
            'http' => array(  
                'method' => 'POST',  
                // 'content' => 'name=caiknife&email=caiknife@gmail.com',  
                'content' => http_build_query($post),/*生成URL-encode*/  
            ),  
        );  
      
        $result = file_get_contents($url, false, stream_context_create($options)/* 创建并返回一个资源流上下文,*/);  
      
        return $result;  
    }  
      
    $data = file_get_contents_post("http://www.a.com/post/post.php", array('name'=>'caiknife', 'email'=>'caiknife@gmail.com'));  
      
    var_dump($data);  

