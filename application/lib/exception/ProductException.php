<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/7
 * Time: 15:38
 */

namespace app\lib\exception;


class ProductException extends BaseException
{
     public $code = 404;
    //错误具体信息
    public $msg = '指定的商品不存在，请检查参数';
    //自定义错误码
    public $errorCode = 20000;
}