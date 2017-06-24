<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/3
 * Time: 10:58
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = '请求的banner不存在';
    public $errorCode = 40000;

}