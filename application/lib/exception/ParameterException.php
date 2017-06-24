<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/3
 * Time: 14:06
 */

namespace app\lib\exception;


use Throwable;

class ParameterException extends BaseException
{
    public $code = 400;
    public $mssg = '参数错误';
    public $errorCode = 10000;
}