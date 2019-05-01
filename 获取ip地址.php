/**
 * 获取ip地址
 * @return string|null
 */
<?php
public static function getIp()
{
    $ip = '';
    if ($_SERVER['HTTP_CLIENT_IP'] && strcasecmp($_SERVER['HTTP_CLIENT_IP'], 'unknown')) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif ($_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], 'unknown')) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
 
    preg_match('/^((?:\d{1,3}\.){3}\d{1,3})/', $ip, $match);
    return $match ? $match[0] : null;
}
}

/*1.HTTP_CLIENT_IP头是有的，但未成标准，不一定服务器都实现。

2.HTTP_X_FORWARDED_FOR 是有标准定义，用来识别经过HTTP代理后的客户端IP地址，格式：clientip,proxy1,proxy2。

3.REMOTE_ADDR 是可靠的， 它是最后一个跟你的服务器握手的IP，可能是用户的代理服务器，也可能是自己的反向代理。关于伪造： HTTP_*头都很容易伪造。例如使用火狐插件伪造HTTP_X_FORWARDED_FOR 的IP为 8.8.8.8，此时清掉cookie再访问访问， 获取到的是 8.8.8.8。*/
