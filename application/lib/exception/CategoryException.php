<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/7
 * Time: 16:30
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $code = 404;
    //错误具体信息
    public $msg = '指定的分类不存在，请检查参数';
    //自定义错误码
    public $errorCode = 50000;
}