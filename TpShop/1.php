<?php
$con = $_GET['c'];
echo Talkxiaoi($con);    
function Talkxiaoi($question) {
        //$question=iconv("UTF-8", "GBK//IGNORE", $question);
        $question=urlencode($question);
        $app_key="wZTUdt9xe22d";
        $app_secret="y5QHQfM2p0U76vSpKhEh";
        $realm = "xiaoi.com";
        $method = "POST";
        $uri = "/robot/ask.do";
        $nonce="";
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";  
        for ( $i = 0; $i < 40; $i++) 
                $nonce .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
        $HA1 = sha1($app_key . ":" . $realm . ":" . $app_secret);
        $HA2 = sha1($method . ":" . $uri);
        $sign = sha1($HA1 . ":" . $nonce . ":" . $HA2);
        $headertext= "app_key=\"%s\",nonce=\"%s\",signature=\"%s\"";
        $headersign = sprintf($headertext, $app_key, $nonce, $sign);
        $post_text = "question=\"%s\"&userId=hsycy&platform=custom&type=0";
        $post_data = sprintf($post_text, $question);

        $url = 'http://nlp.xiaoi.com/robot/ask.do';
        //$post_string = array('userId'=>'hsycy','question'=>'你好！','type'=>'0','platform'=>'custom');  
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Auth: '.$headersign));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);  
        curl_close($ch);
        if(substr($result, -1)=="\n"){ //解决最后出现换行符的问题
                $result = substr($result, 0,strlen($result)-1);
        }
        return $result;
}
