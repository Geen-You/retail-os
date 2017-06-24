<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/9
 * Time: 10:55
 */
//https://api.weixin.qq.com/sns/jscode2session?appid=APPID&secret=SECRET&js_code=JSCODE&grant_type=authorization_code
//这里的url用了%s占位
return [
    'app_id' => 'wx958f2adfa0acd4ff',
    'app_secret' => '3ae8e31c2774de04aac4f23ccfb1bd03',
    'login_url' => 'https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code',

    // 微信获取access_token的url地址
    'access_token_url' => "https://api.weixin.qq.com/cgi-bin/token?" .
"grant_type=client_credential&appid=%s&secret=%s",
];