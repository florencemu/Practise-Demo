<?php  
    function socket_post($url, $post) {  
        $urls = parse_url($url); /*解析url*/ 
        if (!isset($urls['port'])) {  
            $urls['port'] = 80;  
        }  
      
        $fp = fsockopen($urls['host'], $urls['port'], $errno, $errstr);  /*打开一个socket连接*/
        if (!$fp) {  
            echo "$errno, $errstr";  
            exit();  
        }  
      
        $post = http_build_query($post);  /*使用给出的关联(或下标)数组生成一个经过 URL-encode 的请求字符串*/
        $length = strlen($post);  
        $header = <<<HEADER  
    POST {$urls['path']} HTTP/1.1  
    Host: {$urls['host']}  
    Content-Type: application/x-www-form-urlencoded  
    Content-Length: {$length}  
    Connection: close  
      
    {$post}  
    HEADER;  
      
        fwrite($fp, $header);  
        $result = '';  
        while (!feof($fp)) {  
            // receive the results of the request  
            $result .= fread($fp, 512);  
        }  
        $result = explode("rnrn", $result, 2);  
        return $result[1];  
    }  
      
    $data = socket_post("http://www.a.com/post/post.php", array('name'=>'caiknife', 'email'=>'caiknife@gmail.com'));  
      
    var_dump($data);  

