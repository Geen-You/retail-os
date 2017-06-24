<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/1
 * Time: 14:34
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePostivelnt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
    ];
    protected  $message = [
        'id' => '必须是正整数'
    ];
}