<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/9
 * Time: 13:29
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg ='Token已过期或失效';
    public $errorCode = 10001;
}