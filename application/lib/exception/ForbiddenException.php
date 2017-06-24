<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/15
 * Time: 10:20
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不够';
    public $errorCode = 10001;
}