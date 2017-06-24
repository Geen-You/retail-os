<?php
/**
 * Created by PhpStorm.
 * User: GeenYou
 * Date: 2017/6/9
 * Time: 10:35
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
      'code' => 'require|isNotEmpty'
    ];

    protected $message = [
        'code' => '没有code无法获取Token'
    ];
}