<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/15
 * Time: 15:15
 */

namespace app\lib\exception;


class OrderException extends BaseException
{
    public $code = 404;
    public $msg = '订单不存在，请检查ID';
    public $errorCode = 80000;
}