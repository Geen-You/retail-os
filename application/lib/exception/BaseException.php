<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/3
 * Time: 10:54
 */

namespace app\lib\exception;


use think\Exception;
use Throwable;

class BaseException extends Exception
{
    //HTTP状态码
    public $code = 400;
    //错误具体信息
    public $msg = '参数错误';
    //自定义错误码
    public $errorCode = 10000;

    public function __construct($params=[]){
        if (!is_array($params)){
            return ;
            //或抛出异常 throw new Exception('参数必须是素组');
        }
        if (array_key_exists('code',$params)){
            $this->code = $params['code'];
        }
        if (array_key_exists('msg',$params)){
            $this->msg = $params['msg'];
        }
        if (array_key_exists('errorCode',$params)){
            $this->errorCode = $params['errorCode'];
        }
    }
}