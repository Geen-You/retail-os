<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/9
 * Time: 18:31
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = 404;
    public $msg ='用户不存在';
    public $errorCode = 60000;
}